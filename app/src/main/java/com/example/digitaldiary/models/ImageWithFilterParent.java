package com.example.digitaldiary.models;

import java.util.ArrayList;

public class ImageWithFilterParent {
    private String filter;
    private ArrayList<ImageDataModel> images = new ArrayList<>();

    public ImageWithFilterParent(String filter, ArrayList<ImageDataModel> images) {
        this.filter = filter;
        this.images = images;
    }

    public ImageWithFilterParent(String filter, ImageDataModel image){
        this.filter = filter;
        this.images.add(image);
    }

    public String getFilter() {
        return filter;
    }

    public void setFilter(String filter) {
        this.filter = filter;
    }

    public ArrayList<ImageDataModel> getImages() {
        return images;
    }

    public void setImages(ArrayList<ImageDataModel> images) {
        this.images = images;
    }
}
