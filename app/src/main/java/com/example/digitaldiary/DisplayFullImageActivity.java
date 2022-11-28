package com.example.digitaldiary;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.FileProvider;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.ImageView;
import android.widget.LinearLayout;

import com.example.digitaldiary.repository.ImagesDatabase;
import com.example.digitaldiary.repository.SQLiteDB;

import java.io.ByteArrayOutputStream;
import java.io.File;

public class DisplayFullImageActivity extends AppCompatActivity {

    private ImageView fullImage;

    private LinearLayout shareImage;
    private LinearLayout deleteImage;
    private LinearLayout deleteRecord;

    private String imagePath;

    private SQLiteDB sqLiteDB;
    private ImagesDatabase imagesDatabase;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        setContentView(R.layout.activity_display_full_image);

        getSupportActionBar().hide();
        this.getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,WindowManager.LayoutParams.FLAG_FULLSCREEN);

        shareImage = findViewById(R.id.share_image_layout);
        deleteRecord = findViewById(R.id.delete_record_layout);
        deleteImage = findViewById(R.id.delete_image_layout);

        imagePath = getIntent().getStringExtra("Image");

        fullImage = findViewById(R.id.full_image);
        fullImage.setImageURI(Uri.fromFile(new File(imagePath)));

        sqLiteDB = SQLiteDB.getInstance(this);
        imagesDatabase = new ImagesDatabase(this);

        shareImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Bitmap icon = BitmapFactory.decodeFile(imagePath);
                Intent share = new Intent(Intent.ACTION_SEND);
                share.setType("image/jpeg");
                ByteArrayOutputStream bytes = new ByteArrayOutputStream();
                icon.compress(Bitmap.CompressFormat.JPEG, 100, bytes);
                share.putExtra(Intent.EXTRA_STREAM, FileProvider.getUriForFile(DisplayFullImageActivity.this, getApplicationContext().getPackageName() + ".provider", new File(imagePath)));
                share.addFlags(Intent.FLAG_GRANT_READ_URI_PERMISSION);
                startActivity(Intent.createChooser(share, "Share Image"));
            }
        });

        deleteImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                /*if (deleteRecordDialog("This will delete the image from storage and the record. Do you want to continue?", "Delete Image")){
                    sqLiteDB.ImageDao().deleteRecord(imagePath);
                    Log.d("DisplayFullImageActivity", "imagePath: " + imagePath);
                }*/
            }
        });

        deleteRecord.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                /*if (deleteRecordDialog("This will only delete the record (and not the image). Do you want to continue?", "Delete Record")){
                    sqLiteDB.ImageDao().deleteRecord(imagePath);
                }*/

                deleteRecordDialog("This will only delete the record (and not the image). Do you want to continue?", "Delete Record");
            }
        });
    }

    private void deleteRecordDialog(String message, String title) {
        AlertDialog.Builder alertBuilder = new AlertDialog.Builder(DisplayFullImageActivity.this);
        //Uncomment the below code to Set the message and title from the strings.xml file
        alertBuilder.setMessage(message).setTitle(title);

        final boolean[] deleteImage = {false};

        //Setting message manually and performing action on button click
        alertBuilder.setMessage(message)
                .setTitle(title)
                .setCancelable(false)
                .setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        deleteImage[0] = true;
                        String label = sqLiteDB.ImageDao().getLabelFromImagePath(imagePath);
                        imagesDatabase.deleteImageRecord(label, imagePath);
                        sqLiteDB.ImageDao().deleteRecord(imagePath);

                        moveTaskToBack(false);
                    }
                })
                .setNegativeButton("No", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        //  Action for 'NO' Button
                        //dialog.cancel();
                        deleteImage[0] = false;
                    }
                });
        //Creating dialog box
        AlertDialog alert = alertBuilder.create();
        //Setting the title manually
        //alert.setTitle("AlertDialogExample");
        alert.show();

        Log.d("DisplayFullImageActivity", "boolean: " + deleteImage[0]);

        //return deleteImage[0];
    }
}