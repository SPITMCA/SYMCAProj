package com.example.digitaldiary.repository;

import android.content.Context;
import android.net.Uri;
import android.util.Log;

import androidx.annotation.NonNull;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.mlkit.vision.common.InputImage;
import com.google.mlkit.vision.objects.DetectedObject;
import com.google.mlkit.vision.objects.ObjectDetector;
import com.google.mlkit.vision.objects.defaults.ObjectDetectorOptions;
import com.google.mlkit.vision.objects.ObjectDetection;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

public class ObjectDetectionAPI {
    private ObjectDetectorOptions liveObjectDetectorOptions;
    private ObjectDetectorOptions staticObjectDetectorOptions;
    private ObjectDetector objectDetector;
    private Context context;

    public ObjectDetectionAPI(Context context) {
        this.liveObjectDetectorOptions = new ObjectDetectorOptions.Builder()
                .setDetectorMode(ObjectDetectorOptions.STREAM_MODE)
                .enableClassification()  // Optional
                .build();

        this.staticObjectDetectorOptions = new ObjectDetectorOptions.Builder()
                .setDetectorMode(ObjectDetectorOptions.SINGLE_IMAGE_MODE)
                .enableMultipleObjects()
                .enableClassification()  // Optional
                .build();

        this.objectDetector = ObjectDetection.getClient(staticObjectDetectorOptions);

        this.context = context;
    }

    public ArrayList<String> analyzeImage(Uri currentImage) throws IOException, InterruptedException {
        Log.d("ObjectDetection", "URI: " + currentImage.getPath());

        InputImage image = InputImage.fromFilePath(this.context, currentImage);
        //InputImage image = InputImage.fromBitmap(temp, 0);

        //Log.d("ImageLocationAnalyzer", "Image: " + this.images.get(i).getImageTitle() + " " + this.images.get(i).getImagePath());
        //Log.d("ImageAnalyzerURI", "Type: " + Uri.fromFile(new File(this.images.get(i).getImagePath())));

        ArrayList<String> temp = new ArrayList<>();

        ExecutorService executorService = Executors.newFixedThreadPool(1);
        executorService.execute(new Runnable() {
            @Override
            public void run() {
                objectDetector.process(image)
                        .addOnSuccessListener(
                                new OnSuccessListener<List<DetectedObject>>() {
                                    @Override
                                    public void onSuccess(List<DetectedObject> detectedObjects) {
                                        // Task completed successfully
                                        // ...

                                        for (int i = 0; i < detectedObjects.size(); i++){
                                            for (int j = 0; j < detectedObjects.get(i).getLabels().size(); j++){
                                                Log.d("ObjectDetection", "Detected Object " + i + ": " + detectedObjects.get(i).getLabels().get(j).getText());
                                                temp.add(detectedObjects.get(i).getLabels().get(j).getText());
                                            }
                                        }
                                    }
                                })
                        .addOnFailureListener(
                                new OnFailureListener() {
                                    @Override
                                    public void onFailure(@NonNull Exception e) {
                                        // Task failed with an exception
                                        // ...
                                    }
                                });
            }
        });

        //labelledImages.add(new ImageDataModel());

        //Log.d("ImageAnalyzer", "Image Processing: " + imageLabeler.process(image).getResult());

        executorService.awaitTermination(3000, TimeUnit.MILLISECONDS);

        Log.d("ObjectDetection", "Labelled Images: " + temp.size());

        return temp;
    }
}
