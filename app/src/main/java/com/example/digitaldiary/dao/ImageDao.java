package com.example.digitaldiary.dao;

import static androidx.room.OnConflictStrategy.ABORT;
import static androidx.room.OnConflictStrategy.REPLACE;

import androidx.room.Dao;
import androidx.room.Delete;
import androidx.room.Insert;
import androidx.room.Query;

import com.example.digitaldiary.models.ImageDataModel;

import java.util.List;

@Dao
public interface ImageDao {
    //Insert Query
    @Insert(onConflict = ABORT)
    void insert(ImageDataModel imageDataModel);

    //Delete Query
    @Delete
    void delete(ImageDataModel imageDataModel);

    //Delete all query
    @Delete
    void reset(List<ImageDataModel> imageDataModels);

    //Update Query
    @Query("UPDATE labeled_images SET label = :label WHERE ID = :sID")
    void update(int sID, String label);

    //Get all data query
    @Query("SELECT * FROM labeled_images")
    List<ImageDataModel> getAll();

    //Get specific images query
    @Query("SELECT id, imageTitle, imagePath, label FROM labeled_images WHERE label = :query")
    List<ImageDataModel> getImagesMatchingQuery(String query);

    //Delete specific record
    @Query("DELETE FROM labeled_images WHERE imagePath = :imagePath")
    void deleteRecord(String imagePath);

    @Query("SELECT label FROM labeled_images WHERE imagePath = :imagePath")
    String getLabelFromImagePath(String imagePath);

    @Query("SELECT label FROM labeled_images")
    List<String> getAllLabels();

    @Query("SELECT imageTitle, imagePath, label FROM labeled_images WHERE imagePath = :imagePath AND imageTitle = :imageTitle AND label = :label")
    boolean doesRecordExist(String imagePath, String imageTitle, String label);
}