package com.example.digitaldiary.models;

import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

import java.io.Serializable;

@Entity(tableName = "labeled_images")

public class ImageDataModel implements Serializable {

    @PrimaryKey(autoGenerate = true)
    private int id;

    @ColumnInfo(name = "imageTitle")
    private String imageTitle;

    @ColumnInfo(name = "imagePath")
    private String imagePath;

    @ColumnInfo(name = "label")
    private String label;

    @ColumnInfo(name = "imageDate")
    private String imageDate;

    @ColumnInfo(name = "location")
    private String location;

    public ImageDataModel() {
    }

    public ImageDataModel(String imageTitle, String imagePath) {
        super();
        this.imageTitle = imageTitle;
        this.imagePath = imagePath;
    }

    public ImageDataModel(String imageTitle, String imagePath, String label, String imageDate, String location) {
        this.imageTitle = imageTitle;
        this.imagePath = imagePath;
        this.label = label;
        this.imageDate = imageDate;
        this.location = location;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    /**
     * @return the imageTitle
     */
    public String getImageTitle() {
        return imageTitle;
    }

    /**
     * @param imageTitle the imageTitle to set
     */
    public void setImageTitle(String imageTitle) {
        this.imageTitle = imageTitle;
    }

    /**
     * @return the imagePath
     */
    public String getImagePath() {
        return imagePath;
    }

    /**
     * @param imagePath the imagePath to set
     */
    public void setImagePath(String imagePath) {
        this.imagePath = imagePath;
    }

    public String getLabel() {
        return label;
    }

    public void setLabel(String label) {
        this.label = label;
    }

    public String getImageDate() {
        return imageDate;
    }

    public void setImageDate(String imageDate) {
        this.imageDate = imageDate;
    }

    public String getLocation() {
        return location;
    }

    public void setLocation(String location) {
        this.location = location;
    }
}
