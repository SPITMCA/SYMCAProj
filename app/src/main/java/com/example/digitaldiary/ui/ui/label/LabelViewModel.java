package com.example.digitaldiary.ui.ui.label;

import android.app.Activity;
import android.app.Application;
import android.net.Uri;
import android.os.CountDownTimer;
import android.os.Handler;
import android.os.Looper;
import android.util.Log;

import androidx.lifecycle.AndroidViewModel;
import androidx.lifecycle.MutableLiveData;

import com.example.digitaldiary.common.ReadInternalMemory;
import com.example.digitaldiary.common.SharedPreferences;
import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.models.ImageWithFilterParent;
import com.example.digitaldiary.models.User;
import com.example.digitaldiary.repository.ImageLocationAnalyzer;
import com.example.digitaldiary.repository.ImagesDatabase;
import com.google.firebase.auth.FirebaseAuth;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

public class LabelViewModel extends AndroidViewModel {

    private MutableLiveData<ArrayList<String>> mLabels;
    private ArrayList<ImageWithFilterParent> images;
    private ArrayList<ImageDataModel> tempImageDataModelImages;
    private MutableLiveData<ArrayList<ImageWithFilterParent>> imageWithFilterParent;
    private SharedPreferences sharedPreferences;
    private ImagesDatabase imagesDatabase;
    private Map<String, ArrayList<ImageDataModel>> labelledImages;
    private ImageLocationAnalyzer imageLocationAnalyzer;
    private ArrayList<String> labels;

    public LabelViewModel(Application application) {
        super(application);
        this.images = new ArrayList<>();
        this.labels = new ArrayList<>();
        this.mLabels = new MutableLiveData<>();
        this.imageLocationAnalyzer = new ImageLocationAnalyzer(getApplication());
    }

    /*public LiveData<String> getText() {
        return mText;
    }*/

    public void loadImages(Activity activity) throws IOException {
        /*ExecutorService executorService = Executors.newFixedThreadPool(3);
        executorService.execute(new Runnable() {
            @Override
            public void run() {
                images = new ReadInternalMemory().getAllImages(activity);

                Log.d("HomeViewModel", "" + images.size());
            }
        });

        try {
            executorService.awaitTermination(2000, TimeUnit.MILLISECONDS);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }*/

        /*DateSort dateSort = new DateSort(this.images);
        images = dateSort.sort();*/

        //Thread thread

        /*ImageLocationAnalyzer imageLocationAnalyzer = new ImageLocationAnalyzer(activity, this.images);
        this.temp = imageLocationAnalyzer.analyzeImages();*/

        Log.d("HomeViewModel", "User: " + FirebaseAuth.getInstance().getCurrentUser().getUid());

        sharedPreferences = new SharedPreferences(activity);
        User user = sharedPreferences.getUserData(FirebaseAuth.getInstance().getCurrentUser().getUid());
        this.labelledImages = new HashMap<>();

        if (user.getFilterType().equals("Location")){
            imagesDatabase = new ImagesDatabase();
            if (!imagesDatabase.isImageDataAvailable()) {
                ExecutorService executorService = Executors.newFixedThreadPool(3);
                executorService.execute(new Runnable() {
                    @Override
                    public void run() {
                        /*ReadAllImages readAllImages = new ReadAllImages(activity);
                        readAllImages.execute(activity);*/

                        ReadInternalMemory readInternalMemory = new ReadInternalMemory();
                        tempImageDataModelImages = readInternalMemory.getAllImages(activity);
                    }
                });

                try {
                    executorService.awaitTermination(5000, TimeUnit.MILLISECONDS);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }

                Log.d("HomeViewModel", "After reading images!!: " + tempImageDataModelImages.size());

                /*ExecutorService executorService1 = Executors.newFixedThreadPool(3);
                executorService.execute(new Runnable() {
                    @Override
                    public void run() {
                        imageLocationAnalyzer = new ImageLocationAnalyzer(activity, tempImageDataModelImages);
                        try {
                            Log.d("HomeViewModel", "Before Analyzer");
                            labelledImages = imageLocationAnalyzer.analyzeImages();
                            Log.i("HomeViewModel", "After Analyzer " + labelledImages.size());
                        } catch (IOException e) {
                            e.printStackTrace();
                        }
                    }
                });

                try {
                    executorService.awaitTermination(5000, TimeUnit.MILLISECONDS);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }*/

                imageLocationAnalyzer = new ImageLocationAnalyzer(activity, tempImageDataModelImages);

                labelledImages = imageLocationAnalyzer.analyzeImages();

                Log.i("HomeViewModel", "Outside Analyzer " + labelledImages.size());

                new Handler(Looper.getMainLooper()).postDelayed(new Runnable() {
                    @Override
                    public void run() {
                        //Log.d("HomeFragment: ", "ShowImages size: " + showImages.size());

                        new CountDownTimer(2000, 1000) {

                            public void onTick(long millisUntilFinished) {

                            }

                            public void onFinish() {
                                ExecutorService executorService2 = Executors.newFixedThreadPool(3);
                                executorService.execute(new Runnable() {
                                    @Override
                                    public void run() {
                                        Log.d("HomeViewModel", "Inside 3rd executor " + labelledImages.size());
                                        imagesDatabase = new ImagesDatabase(labelledImages);
                                        //imagesDatabase.uploadImageDetails();
                                    }
                                });

                                try {
                                    executorService.awaitTermination(5000, TimeUnit.MILLISECONDS);
                                } catch (InterruptedException e) {
                                    e.printStackTrace();
                                }
                            }
                        }.start();
                    }
                }, 3000);

                /*ExecutorService executorService2 = Executors.newFixedThreadPool(3);
                executorService.execute(new Runnable() {
                    @Override
                    public void run() {
                        Log.d("HomeViewModel", "Inside 3rd executor " + labelledImages.size());
                        imagesDatabase = new ImagesDatabase(labelledImages);
                        imagesDatabase.uploadImageDetails();
                    }
                });

                try {
                    executorService.awaitTermination(5000, TimeUnit.MILLISECONDS);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }*/
            }

            this.images = imagesDatabase.downloadImageDataWithFilter();
            Log.d("HomeViewModel", "" + images.size());
        }

        else{
            Log.d("Home", "This needs to be done!!");
        }
    }

    public void setImageWithFilterParent() {
        /*temp.add(new ImageWithFilterParent(genre1, images1));
        temp.add(new ImageWithFilterParent(genre2, images2));
        temp.add(new ImageWithFilterParent(genre3, images3));*/

        //temp.add(new ImageWithFilterParent());

        this.imageWithFilterParent.setValue(images);
    }

    public MutableLiveData<ArrayList<ImageWithFilterParent>> getImageWithFilterParent(){
        this.setImageWithFilterParent();
        return imageWithFilterParent;
    }

    public void setImages(ArrayList<ImageWithFilterParent> images){
        this.images = images;
        //this.startImageAnalysis();
    }

    public void startImageAnalysis(Uri currentUri){
        try {
            labels = imageLocationAnalyzer.analyzeImage(currentUri);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public void setLabels(){
        Log.d("HomeViewModel", "labels size: " + this.labels.size());
        this.mLabels.setValue(this.labels);
    }

    public String getLabels(){
        String result = "";

        for (int i = 0; i < this.mLabels.getValue().size(); i++) {
            result += mLabels.getValue().get(i) + "\n";
        }

        return result;
    }
}