package com.example.digitaldiary.common;

import android.app.Activity;
import android.database.Cursor;
import android.net.Uri;
import android.provider.MediaStore;
import android.util.Log;

import com.example.digitaldiary.models.ImageDataModel;

import java.io.File;
import java.util.ArrayList;

public class ReadInternalMemory implements Runnable {
    private ArrayList<ImageDataModel> allImages = new ArrayList<ImageDataModel>();
    private static ArrayList<File> imageFiles = new ArrayList<File>();

    public ArrayList<ImageDataModel> getAllImages(Activity activity) {

        //Remove older images to avoid copying same image twice
        allImages.clear();

        Uri uri;
        Cursor cursor;
        int column_index_data, column_index_folder_name;

        String absolutePathOfImage = null, imageName;

        //get all images from external storage

        uri = android.provider.MediaStore.Images.Media.EXTERNAL_CONTENT_URI;
        //uri = Uri.fromFile(new File("sdcard/DCIM"));
        //uri = Uri.parse("file://sdcard/DCIM");
        //uri = android.provider.MediaStore.Images.Media.INTERNAL_CONTENT_URI;

        Log.d("ReadInternalMemory", "URI: " + uri.toString());

        //uri = Uri.parse(System.getenv("EXTERNAL_STORAGE"));

        String[] projection = { MediaStore.MediaColumns.DATA,
                MediaStore.Images.Media.DISPLAY_NAME };

        cursor = activity.getContentResolver().query(uri, projection, null,
                null, null);

        column_index_data = cursor.getColumnIndexOrThrow(MediaStore.MediaColumns.DATA);

        column_index_folder_name = cursor
                .getColumnIndexOrThrow(MediaStore.Images.Media.DISPLAY_NAME);

        while (cursor.moveToNext()) {
            absolutePathOfImage = cursor.getString(column_index_data);
            imageName = cursor.getString(column_index_folder_name);
            allImages.add(new ImageDataModel(imageName, absolutePathOfImage));
        }

        // Get all Internal storage images

        /*uri = android.provider.MediaStore.Images.Media.INTERNAL_CONTENT_URI;

        cursor = activity.getContentResolver().query(uri, projection, null,
                null, null);

        column_index_data = cursor.getColumnIndexOrThrow(MediaStore.MediaColumns.DATA);

        column_index_folder_name = cursor
                .getColumnIndexOrThrow(MediaStore.Images.Media.DISPLAY_NAME);

        while (cursor.moveToNext()) {
            absolutePathOfImage = cursor.getString(column_index_data);
            imageName = cursor.getString(column_index_folder_name);
            allImages.add(new ImageDataModel(imageName, absolutePathOfImage));
        }*/

        //progressDialog.dismiss();

        return allImages;
    }



    public static ArrayList<File> load_image_files(File dir) {

        String extension = ".jpg";
        File[] listFile = dir.listFiles();
        if (listFile != null) {
            for (int i = 0; i < listFile.length; i++) {

                if (listFile[i].isDirectory()) {
                    load_image_files(listFile[i]);
                } else {
                    if (listFile[i].getName().endsWith(extension)) {
                        //name_list.add(listFile[i].getName());
                        //name_path_list.add(listFile[i].getAbsolutePath());
                        imageFiles.add(listFile[i]);
                    }
                }
            }
        }

        return imageFiles;
    }

    public ArrayList<ImageDataModel> getImageFiles() {
        return allImages;
    }

    @Override
    public void run() {
        /*//Remove older images to avoid copying same image twice
        allImages.clear();

        Uri uri;
        Cursor cursor;
        int column_index_data, column_index_folder_name;

        String absolutePathOfImage = null, imageName;

        //get all images from external storage

        //uri = android.provider.MediaStore.Images.Media.EXTERNAL_CONTENT_URI;

        uri = Uri.parse(System.getenv("EXTERNAL_STORAGE"));

        //Log.d("ReadInternalMemory", "uri: " + uri);

        String[] projection = { MediaStore.MediaColumns.DATA,
                MediaStore.Images.Media.DISPLAY_NAME };

        cursor = activity.getContentResolver().query(uri, projection, null,
                null, null);

        column_index_data = cursor.getColumnIndexOrThrow(MediaStore.MediaColumns.DATA);

        column_index_folder_name = cursor
                .getColumnIndexOrThrow(MediaStore.Images.Media.DISPLAY_NAME);

        while (cursor.moveToNext()) {
            absolutePathOfImage = cursor.getString(column_index_data);
            imageName = cursor.getString(column_index_folder_name);
            allImages.add(new ImageDataModel(imageName, absolutePathOfImage));
        }

        // Get all Internal storage images

        /*uri = android.provider.MediaStore.Images.Media.INTERNAL_CONTENT_URI;

        cursor = activity.getContentResolver().query(uri, projection, null,
                null, null);

        column_index_data = cursor.getColumnIndexOrThrow(MediaStore.MediaColumns.DATA);

        column_index_folder_name = cursor
                .getColumnIndexOrThrow(MediaStore.Images.Media.DISPLAY_NAME);

        while (cursor.moveToNext()) {
            absolutePathOfImage = cursor.getString(column_index_data);
            imageName = cursor.getString(column_index_folder_name);
            allImages.add(new ImageDataModel(imageName, absolutePathOfImage));
        }

        progressDialog.dismiss();*/
    }
}
