package com.example.digitaldiary.common;

import android.app.Activity;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.util.Log;

import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.repository.ImageLocationAnalyzer;
import com.example.digitaldiary.repository.ImagesDatabase;
import com.example.digitaldiary.ui.ui.label.LabelViewModel;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Map;

public class ReadAllImages extends AsyncTask<Activity, Integer, ArrayList<ImageDataModel>> {
    private ArrayList<ImageDataModel> images;
    private LabelViewModel labelViewModel;
    private ImageLocationAnalyzer imageLocationAnalyzer;
    private Map<String, ArrayList<ImageDataModel>> labelledImages;
    private Activity activity;
    private ImagesDatabase imagesDatabase;
    private ProgressDialog progressDialog;

    public ReadAllImages(Activity activity) {
        this.images = new ArrayList<>();
        this.labelViewModel = new LabelViewModel(activity.getApplication());
        this.activity = activity;
        /*this.progressDialog = new ProgressDialog(activity);
        this.progressDialog.setMessage("Please wait while we read your images!!");
        this.progressDialog.show();*/
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
    }

    @Override
    protected ArrayList<ImageDataModel> doInBackground(Activity... activities) {
        images = new ReadInternalMemory().getAllImages(this.activity);

        return images;
    }

    @Override
    protected void onPostExecute(ArrayList<ImageDataModel> imageDataModels) {
        super.onPostExecute(imageDataModels);
        //homeViewModel.setImages(imageDataModels);

        this.imageLocationAnalyzer = new ImageLocationAnalyzer(this.activity, imageDataModels);

        try {
            this.labelledImages = this.imageLocationAnalyzer.analyzeImages();
        } catch (IOException e) {
            e.printStackTrace();
        }

        this.imagesDatabase = new ImagesDatabase(labelledImages);
        //imagesDatabase.uploadImageDetails();

        Log.d("ReadAllImages", "Labelled Images Size: " + this.labelledImages.size());

        //progressDialog.dismiss();
    }

    @Override
    protected void onProgressUpdate(Integer... values) {
        super.onProgressUpdate(values);
        //progressDialog.show();
    }

    public ArrayList<ImageDataModel> getImages() {
        return images;
    }

    public void setImages(ArrayList<ImageDataModel> images) {
        this.images = images;
    }
}
