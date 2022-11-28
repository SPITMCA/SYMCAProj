package com.example.digitaldiary.repository;

import android.content.Context;
import android.net.Uri;
import android.util.Log;

import androidx.annotation.NonNull;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.mlkit.vision.common.InputImage;
import com.google.mlkit.vision.label.ImageLabel;
import com.google.mlkit.vision.label.ImageLabeler;
import com.google.mlkit.vision.label.ImageLabeling;
import com.google.mlkit.vision.label.defaults.ImageLabelerOptions;
import com.google.mlkit.vision.text.Text;
import com.google.mlkit.vision.text.TextRecognition;
import com.google.mlkit.vision.text.TextRecognizer;
import com.google.mlkit.vision.text.latin.TextRecognizerOptions;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

public class TextExtraction {
    private TextRecognizer textRecognizer;
    private Context context;

    public TextExtraction(Context context){
        this.textRecognizer = TextRecognition.getClient(TextRecognizerOptions.DEFAULT_OPTIONS);
        this.context = context;
    }

    public String analyzeImage(Uri currentImage) throws IOException, InterruptedException {
        Log.d("TextExtraction", "URI: " + currentImage.getPath());

        InputImage image = InputImage.fromFilePath(this.context, currentImage);
        //InputImage image = InputImage.fromBitmap(temp, 0);

        //Log.d("ImageLocationAnalyzer", "Image: " + this.images.get(i).getImageTitle() + " " + this.images.get(i).getImagePath());
        //Log.d("ImageAnalyzerURI", "Type: " + Uri.fromFile(new File(this.images.get(i).getImagePath())));

        final String[] temp = {""};

        ExecutorService executorService = Executors.newFixedThreadPool(1);
        executorService.execute(new Runnable() {
            @Override
            public void run() {
                Task<Text> result =
                        textRecognizer.process(image)
                                .addOnSuccessListener(new OnSuccessListener<Text>() {
                                    @Override
                                    public void onSuccess(Text visionText) {
                                        // Task completed successfully
                                        // ...

                                        Log.d("TextExtraction", visionText.getText().toString());
                                        temp[0] = visionText.getText().toString();
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

        //Log.d("ImageLocationAnalyzer", "Labelled Images: " + temp.size());

        return temp[0];
    }
}
