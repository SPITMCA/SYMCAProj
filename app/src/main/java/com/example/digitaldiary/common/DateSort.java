package com.example.digitaldiary.common;

import android.media.ExifInterface;
import android.util.Log;

import com.example.digitaldiary.models.ImageDataModel;

import java.io.IOException;
import java.util.ArrayList;

public class DateSort {
    private ArrayList<ImageDataModel> images;
    private ExifInterface exifInterface;

    public DateSort() {
    }

    public DateSort(ArrayList<ImageDataModel> images) {
        this.images = images;
    }

    public ArrayList<ImageDataModel> sort() throws IOException {
        ArrayList<ImageDataModel> sortedImages = new ArrayList<>();

        for (int i = 0; i < this.images.size(); i++){
                this.exifInterface = new ExifInterface(this.images.get(i).getImagePath());
                String datetime =  this.exifInterface.getAttribute(ExifInterface.TAG_DATETIME_ORIGINAL);
                this.images.get(i).setImageDate(datetime);
                this.images.get(i).setLocation(this.exifInterface.getAttribute(ExifInterface.TAG_GPS_LATITUDE));
                Log.d("DateSort", "" + datetime);
                sortedImages.add(this.images.get(i));
        }

        return sortedImages;
    }
}
