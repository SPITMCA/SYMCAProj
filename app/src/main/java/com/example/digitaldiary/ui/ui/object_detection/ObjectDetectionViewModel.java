package com.example.digitaldiary.ui.ui.object_detection;

import android.app.Application;
import android.content.Context;
import android.net.Uri;
import android.util.Log;

import androidx.lifecycle.AndroidViewModel;
import androidx.lifecycle.LiveData;
import androidx.lifecycle.MutableLiveData;
import androidx.lifecycle.ViewModel;

import com.example.digitaldiary.repository.ObjectDetectionAPI;
import com.example.digitaldiary.repository.ObjectDetectionAPI;

import java.io.IOException;
import java.util.ArrayList;

public class ObjectDetectionViewModel extends AndroidViewModel {
    private ObjectDetectionAPI objectDetection;
    private ArrayList<String> objects;
    private MutableLiveData<ArrayList<String>> detectedObjects;

    public ObjectDetectionViewModel(Application application) {
        super(application);
        this.objectDetection = new ObjectDetectionAPI(getApplication());
        this.objects = new ArrayList<>();
        this.detectedObjects = new MutableLiveData<>();
    }

    public void startImageAnalysis(Uri currentUri){
        try {
            objects = objectDetection.analyzeImage(currentUri);
        } catch (IOException e) {
            e.printStackTrace();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    public void setObjects(){
        Log.d("ObjectDetectionViewModel", "detected objects size: " + objects.size());
        this.detectedObjects.setValue(objects);
    }

    public String getObjects(){
        String result = "";

        for (int i = 0; i < detectedObjects.getValue().size(); i++){
            result += detectedObjects.getValue().get(i) + "\n";
        }

        return result;
    }
}