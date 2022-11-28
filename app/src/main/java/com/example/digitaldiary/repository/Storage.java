package com.example.digitaldiary.repository;

import android.content.Context;
import android.graphics.Bitmap;
import android.net.Uri;
import android.provider.MediaStore;
import android.util.Log;
import android.widget.Toast;

import androidx.annotation.NonNull;

import com.example.digitaldiary.common.FileUtils;
import com.example.digitaldiary.common.SharedPreferences;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.StorageReference;
import com.google.firebase.storage.UploadTask;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

public class Storage {
    private FirebaseAuth mAuth;
    private StorageReference storageReference;
    private StorageReference imagesStorageReference;
    private SharedPreferences sharedPreferences;
    private String uid;
    private Context context;

    public Storage(Context context) {
        this.context = context;
        this.mAuth = FirebaseAuth.getInstance();
        this.uid = mAuth.getCurrentUser().getUid();
        this.sharedPreferences = new SharedPreferences(this.context);
        this.storageReference = FirebaseStorage.getInstance().getReference();
        this.imagesStorageReference = storageReference.child("images/");
    }

    public String uploadImageToStorage(Uri currentUri){
        final String[] downloadUrl = {""};

        if (this.sharedPreferences.getUserData(this.uid).isTakeBackup()){
            if (this.sharedPreferences.getUserData(this.uid).getImageQuality().equals("Original")){
                String [] filePath = FileUtils.getPath(context, currentUri).split("/");
                Log.d("Storage", "uploadImageToStorage: " + filePath[filePath.length - 1]);
                UploadTask uploadTask = this.imagesStorageReference.child(this.uid + "/" + filePath[filePath.length - 1]).putFile(currentUri);

                // Register observers to listen for when the download is done or if it fails
                uploadTask.addOnFailureListener(new OnFailureListener() {
                    @Override
                    public void onFailure(@NonNull Exception exception) {
                        // Handle unsuccessful uploads
                        Toast.makeText(context, "Error uploading image to cloud!!", Toast.LENGTH_SHORT).show();
                        Log.d("Storage", "Storage Exception in original: " + exception.getMessage());
                    }
                }).addOnSuccessListener(new OnSuccessListener<UploadTask.TaskSnapshot>() {
                    @Override
                    public void onSuccess(UploadTask.TaskSnapshot taskSnapshot) {
                        // taskSnapshot.getMetadata() contains file metadata such as size, content-type, etc.
                        // ...
                        taskSnapshot.getStorage().getDownloadUrl().addOnSuccessListener(new OnSuccessListener<Uri>() {
                            @Override
                            public void onSuccess(Uri uri) {
                                downloadUrl[0] = uri.getPath();
                            }
                        });

                        Toast.makeText(context, "Original Quality uploaded!!", Toast.LENGTH_SHORT).show();
                    }
                });

                return downloadUrl[0];
            }

            else if (this.sharedPreferences.getUserData(this.uid).getImageQuality().equals("Compressed")){
                try {
                    Bitmap bitmap = MediaStore.Images.Media.getBitmap(context.getContentResolver(), currentUri);
                    ByteArrayOutputStream out = new ByteArrayOutputStream();
                    bitmap.compress(Bitmap.CompressFormat.JPEG, 80, out);

                    byte[] data = out.toByteArray();

                    String [] filePath = FileUtils.getPath(context, currentUri).split("/");

                    UploadTask uploadTask = this.imagesStorageReference.child(this.uid + "/" + filePath[filePath.length - 1]).putBytes(data);
                    uploadTask.addOnFailureListener(new OnFailureListener() {
                        @Override
                        public void onFailure(@NonNull Exception exception) {
                            // Handle unsuccessful uploads
                            Toast.makeText(context, "Error uploading image to cloud!!", Toast.LENGTH_SHORT).show();
                            Log.d("Storage", "Storage Exception in compressed: " + exception.getMessage());
                        }
                    }).addOnSuccessListener(new OnSuccessListener<UploadTask.TaskSnapshot>() {
                        @Override
                        public void onSuccess(UploadTask.TaskSnapshot taskSnapshot) {
                            // taskSnapshot.getMetadata() contains file metadata such as size, content-type, etc.
                            // ...
                            taskSnapshot.getStorage().getDownloadUrl().addOnSuccessListener(new OnSuccessListener<Uri>() {
                                @Override
                                public void onSuccess(Uri uri) {
                                    downloadUrl[0] = uri.getPath();
                                }
                            });

                            Toast.makeText(context, "Compressed Quality uploaded!!", Toast.LENGTH_SHORT).show();
                            Log.d("Storage", "Storage Exception in compressed uid: " + uid);
                        }
                    });
                } catch (IOException e) {
                    e.printStackTrace();
                }

                return downloadUrl[0];
            }

            /*else if (this.sharedPreferences.getUserData(this.uid).getImageQuality().equals("NA")){
                ShowAlertDialog.showAlertDialog(this.context, "Please select your image quality from the profile section!", "Please select your image quality from the profile section!");
                return downloadUrl[0];
            }*/
        }

        /*else{
            ShowAlertDialog.showAlertDialog(this.context, "Please enable backup from your profile section to save to cloud!", "You cannot upload to cloud!");
            return downloadUrl[0];
        }*/

        return downloadUrl[0];
    }

    public String getImageStorageLinkFromTitle(String imageTitle){
        ExecutorService executorService = Executors.newFixedThreadPool(1);

        final String[] downloadUrl = {""};

        imagesStorageReference.child(mAuth.getCurrentUser().getUid()).child(imageTitle)
                .getDownloadUrl().addOnSuccessListener(new OnSuccessListener<Uri>() {
                                                           @Override
                                                           public void onSuccess(Uri uri) {
                                                               Log.d("Storage", "Uri: " + uri.getPath());
                                                               downloadUrl[0] = uri.getPath();
                                                           }
                                                       });

        /*executorService.execute(new Runnable() {
            @Override
            public void run() {
                imagesStorageReference.child(mAuth.getCurrentUser().getUid()).child(imageTitle)
                        .getDownloadUrl().addOnSuccessListener(new OnSuccessListener<Uri>() {
                    @Override
                    public void onSuccess(Uri uri) {
                        Log.d("Storage", "Uri: " + uri.getPath());
                        downloadUrl[0] = uri.getPath();
                    }
                });
            }
        });

        try {
            executorService.awaitTermination(400, TimeUnit.MILLISECONDS);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }*/

        Log.d("Storage", "Download: " + downloadUrl[0]);

        return downloadUrl[0];
    }
}
