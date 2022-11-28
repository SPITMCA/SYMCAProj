package com.example.digitaldiary.repository;

import android.content.Context;
import android.net.Uri;
import android.util.Log;

import androidx.annotation.NonNull;

import com.example.digitaldiary.models.ImageDataModel;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.mlkit.vision.common.InputImage;
import com.google.mlkit.vision.label.ImageLabel;
import com.google.mlkit.vision.label.ImageLabeler;
import com.google.mlkit.vision.label.ImageLabeling;
import com.google.mlkit.vision.label.defaults.ImageLabelerOptions;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

public class ImageLocationAnalyzer {
    private ArrayList<ImageDataModel> images;
    private Context context;
    //private Set<ImageWithFilterParent> labelledImages;
    private Map<String, ArrayList<ImageDataModel>> labelledImages;

    public ImageLocationAnalyzer() {
    }

    public ImageLocationAnalyzer(Context context) {
        this.context = context;
    }

    public ImageLocationAnalyzer(Context context, ArrayList<ImageDataModel> images) {
        this.context = context;
        this.images = images;
        this.labelledImages = new HashMap<>();
    }

    public Map<String, ArrayList<ImageDataModel>> analyzeImages() throws IOException {
        for (int i = 0; i < 100; i++) {
            /*Uri imageUri = Uri.fromFile(new File(this.images.get(i).getImagePath()));

            Log.d("ImageAnalyzerURI", "Type: " + imageUri);

            Bitmap temp = MediaStore.Images.Media.getBitmap(context.getContentResolver(), imageUri);*/

            InputImage image = InputImage.fromFilePath(this.context, Uri.fromFile(new File(this.images.get(i).getImagePath())));
            //InputImage image = InputImage.fromBitmap(temp, 0);

            Log.d("ImageLocationAnalyzer", "Image: " + this.images.get(i).getImageTitle() + " " + this.images.get(i).getImagePath());
            Log.d("ImageAnalyzerURI", "Type: " + Uri.fromFile(new File(this.images.get(i).getImagePath())));

            ImageLabeler imageLabeler = ImageLabeling.getClient(ImageLabelerOptions.DEFAULT_OPTIONS);

            /*ArrayList<ImageDataModel> temp = new ArrayList<>();
            String[] label = {""};*/

            int finalI = i;
            Log.d("InputImage", "input image: " + image);
            Log.d("ImageAnalyzer", "result: " + imageLabeler.process(image).isSuccessful());
            Log.d("ImageLabeler", "Labeler: " + imageLabeler.process(image).getException());

            imageLabeler.process(image)
                    .addOnSuccessListener(new OnSuccessListener<List<ImageLabel>>() {
                        @Override
                        public void onSuccess(List<ImageLabel> imageLabels) {
                            boolean isPresent = false;
                            //Iterator<ImageWithFilterParent> iterator = labelledImages.iterator();

                            int k = 0;

                            for (k = 0; k < labelledImages.size(); k++) {
                                if (labelledImages.get(imageLabels.get(0)) != null) {
                                    isPresent = true;
                                }
                            }

                            Log.d("ImageAnalyzer", "IsPresent: " + isPresent);

                            if (isPresent) {
                                ArrayList<ImageDataModel> temp = labelledImages.get(imageLabels.get(0));
                                temp.add(images.get(finalI));
                                labelledImages.put(imageLabels.get(0).getText(), temp);
                            } else {
                                ArrayList<ImageDataModel> temp = new ArrayList<>();
                                temp.add(images.get(finalI));
                                labelledImages.put(imageLabels.get(0).getText(), temp);
                            }

                            Log.d("ImageAnalyzer", "Labelled Images inside loop: " + labelledImages.size());

                            /*if (labelledImages.size() == 0){
                                //labelledImages.add(new ImageWithFilterParent(imageLabels.toString(), images.get(finalI)));
                                labelledImages.put(imageLabels.get(0).getText(), images.get(finalI))
                            }

                            else{
                                while(iterator.hasNext()){
                                    ImageWithFilterParent temp = iterator.next();
                                    if (temp.getFilter().equals(imageLabels.get(0).toString())){

                                    }
                                }
                            }*/


                        }
                    }).addOnFailureListener(new OnFailureListener() {
                @Override
                public void onFailure(@NonNull Exception e) {
                    Log.d("ImageAnalyzer", "Exception: " + e.getMessage());
                }
            });

            //labelledImages.add(new ImageDataModel());

            //Log.d("ImageAnalyzer", "Image Processing: " + imageLabeler.process(image).getResult());
        }

        Log.d("ImageLocationAnalyzer", "Labelled Images: " + labelledImages.size());

        return this.labelledImages;
    }


    public ArrayList<String> analyzeImage(Uri currentImage) throws IOException, InterruptedException {
        Log.d("ImageLocationAnalyzer", "URI: " + currentImage.getPath());

        InputImage image = InputImage.fromFilePath(this.context, currentImage);
        //InputImage image = InputImage.fromBitmap(temp, 0);

        //Log.d("ImageLocationAnalyzer", "Image: " + this.images.get(i).getImageTitle() + " " + this.images.get(i).getImagePath());
        //Log.d("ImageAnalyzerURI", "Type: " + Uri.fromFile(new File(this.images.get(i).getImagePath())));

        ImageLabeler imageLabeler = ImageLabeling.getClient(ImageLabelerOptions.DEFAULT_OPTIONS);

        ArrayList<String> temp = new ArrayList<>();

        ExecutorService executorService = Executors.newFixedThreadPool(1);
        executorService.execute(new Runnable() {
            @Override
            public void run() {
                imageLabeler.process(image)
                        .addOnSuccessListener(new OnSuccessListener<List<ImageLabel>>() {
                            @Override
                            public void onSuccess(List<ImageLabel> imageLabels) {
                                Log.d("ImageLocationAnalyzer", "imageLabels size: " + imageLabels.size());

                                for (int i = 0; i < imageLabels.size(); i++){
                                    temp.add(imageLabels.get(i).getText().toString());
                                    Log.d("ImageLocationAnalyzer", "Current Element in temp: " + temp.get(i));
                                }

                                Log.d("ImageLocationAnalyzer", "Inside onSuccess!!");
                            }
                        }).addOnFailureListener(new OnFailureListener() {
                    @Override
                    public void onFailure(@NonNull Exception e) {
                        Log.d("ImageAnalyzer", "Exception: " + e.getMessage());
                    }
                });
            }
        });

        //labelledImages.add(new ImageDataModel());

        //Log.d("ImageAnalyzer", "Image Processing: " + imageLabeler.process(image).getResult());

        executorService.awaitTermination(3000, TimeUnit.MILLISECONDS);

        Log.d("ImageLocationAnalyzer", "Labelled Images: " + temp.size());

        return temp;
    }
}
