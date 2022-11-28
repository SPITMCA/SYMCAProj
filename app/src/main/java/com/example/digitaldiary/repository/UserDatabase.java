package com.example.digitaldiary.repository;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.provider.ContactsContract;
import android.util.Log;
import android.widget.Toast;

import androidx.annotation.NonNull;

import com.example.digitaldiary.account.NewUserForm;
import com.example.digitaldiary.common.SharedPreferences;
import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.models.User;
import com.example.digitaldiary.ui.Home;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import org.jetbrains.annotations.NotNull;

import java.util.Iterator;
import java.util.Objects;

public class UserDatabase {

    private DatabaseReference databaseReference;
    private FirebaseAuth mAuth;
    private Context context;
    private User user;
    private ProgressDialog progressDialog;
    private SQLiteDB sqLiteDB;

    public UserDatabase(Context context){
        this.context = context;
        this.mAuth = FirebaseAuth.getInstance();
        this.databaseReference = FirebaseDatabase.getInstance().getReference();
        this.progressDialog = new ProgressDialog(context);
        this.sqLiteDB = SQLiteDB.getInstance(context);
    }

    public void doesUserExist(){
        databaseReference.child("users").child(mAuth.getCurrentUser().getUid()).get().addOnSuccessListener(new OnSuccessListener<DataSnapshot>() {
            @Override
            public void onSuccess(DataSnapshot dataSnapshot) {
                Log.d("DataSnapshot exists: ", "" + dataSnapshot.exists());

                if (dataSnapshot.exists()){
                    downloadUserDataToSharedPreferences();

                    Intent intent = new Intent(context, Home.class);
                    context.startActivity(intent);
                    ((Activity) context).finish();
                }

                else{
                    Intent intent = new Intent(context, NewUserForm.class);
                    context.startActivity(intent);
                    ((Activity) context).finish();
                }
            }
        });
    }

    public void doesImageDataExist(){
        databaseReference.child("images").child(mAuth.getCurrentUser().getUid()).get().addOnSuccessListener(new OnSuccessListener<DataSnapshot>() {
            @Override
            public void onSuccess(DataSnapshot dataSnapshot) {
                Log.d("DataSnapshot exists: ", "" + dataSnapshot.exists());

                if (dataSnapshot.exists()){
                    downloadImageDataToSQLite();
                }
            }
        });
    }

    public void uploadUserData(){
        String userId = this.mAuth.getCurrentUser().getUid();

        ProgressDialog progressDialog = new ProgressDialog(context);
        progressDialog.setMessage("Please wait while we create your profile...");
        progressDialog.show();

        user = User.getInstance();

        databaseReference.child("users").child(userId).setValue(user,1).addOnSuccessListener(new OnSuccessListener<Void>() {
            @Override
            public void onSuccess(Void unused) {
                progressDialog.dismiss();
                Toast.makeText(context, "Profile Created Successfully!!", Toast.LENGTH_LONG).show();

                Intent i = new Intent(context, Home.class);
                context.startActivity(i);
                ((Activity) context).finish();
            }
        }).addOnFailureListener(new OnFailureListener() {
            @Override
            public void onFailure(@NonNull Exception e) {
                progressDialog.dismiss();
                Toast.makeText(context, "Error Creating Profile!!", Toast.LENGTH_LONG).show();
            }
        });
    }

    public void downloadUserDataToSharedPreferences(){
        databaseReference.child("users").child(mAuth.getCurrentUser().getUid()).get().addOnSuccessListener(new OnSuccessListener<DataSnapshot>() {
            @Override
            public void onSuccess(DataSnapshot dataSnapshot) {
                Log.d("UserDatabase: ", "Downloading user data...");

                Iterable<DataSnapshot> children = dataSnapshot.getChildren();

                User user = new User();

                int i = 0;

                for (DataSnapshot item: children){
                    Log.d("UserDatabase: ", "Item: " + item.getKey());
                    switch (Objects.requireNonNull(item.getKey())){
                        case "imageQuality":
                            user.setImageQuality(item.getValue().toString());
                            i = i + 1;
                            break;

                        case "name":
                            //Iterable<DataSnapshot> genres = item.getChildren();
                            /*for (DataSnapshot genre : genres) {
                                user.addGenre(genre.getValue().toString());
                            }*/
                            i = i + 1;
                            user.setName(item.getValue().toString());
                            break;

                        case "takeBackup":
                            user.setTakeBackup(Boolean.parseBoolean(item.getValue().toString()));
                            i = i + 1;
                            break;

                        case "uid":
                            /*Iterable<DataSnapshot> likedMovies = item.getChildren();
                            for (DataSnapshot like : likedMovies) {
                                user.addToLikedMovies(like.getValue().toString());
                            }*/
                            i = i + 1;
                            user.setUid(item.getValue().toString());
                            break;

                        case "numberOfImagesLabeled":
                            i = i + 1;
                            user.setNumberOfImagesLabeled(Integer.parseInt(item.getValue().toString()));
                            break;

                        case "documentVaultCreated":
                            i = i + 1;
                            user.setDocumentVaultCreated(Boolean.parseBoolean(item.getValue().toString()));
                            break;

                        case "documentVault":
                            Iterable<DataSnapshot> documentVaultChild = item.getChildren();
                            i = i + 1;

                            for (DataSnapshot child1: documentVaultChild){
                                switch(child1.getKey()){
                                    case "name":
                                        user.getDocumentVault().setName(child1.getValue().toString());
                                        i = i + 1;
                                        break;

                                    case "password":
                                        user.getDocumentVault().setPassword(child1.getValue().toString());
                                        i = i + 1;
                                        break;
                                }
                            }

                        default: break;
                            /*i = i + 1;
                            if (i >= 9){
                            break;
                        }*/
                    }
                }

                SharedPreferences showsSharedPreferences = new SharedPreferences(context);
                showsSharedPreferences.storeUserData(user);

                Intent intent = new Intent(context, Home.class);
                context.startActivity(intent);
                ((Activity) context).finish();

                Log.d("User Database: ", "Stored User Data: " + user.getUid());
                Log.d("Login: ", "In UserDatabase");

                Toast.makeText(context, "Please restart the app to see changes!!", Toast.LENGTH_LONG).show();
            }
        }).addOnFailureListener(new OnFailureListener() {
            @Override
            public void onFailure(@NonNull @NotNull Exception e) {
            }
        });
    }

    public void downloadImageDataToSQLite(){
        ProgressDialog progressDialog = new ProgressDialog(context);
        progressDialog.setMessage("Please wait while we sync your data...");
        progressDialog.show();

        databaseReference.child("images").child(mAuth.getCurrentUser().getUid()).get().addOnSuccessListener(new OnSuccessListener<DataSnapshot>() {
            @Override
            public void onSuccess(DataSnapshot dataSnapshot) {
                Iterable<DataSnapshot> children = dataSnapshot.getChildren();

                ImageDataModel temp = new ImageDataModel();

                for (DataSnapshot labels: children){
                    Iterable<DataSnapshot> subItems = labels.getChildren();

                    Log.d("UserDatabase", "Labels: " + labels.getKey());

                    for (DataSnapshot item: subItems){
                        Iterable<DataSnapshot> itemDetails = item.getChildren();

                        Log.d("UserDatabase", "current item: " + item.getKey());

                        for (DataSnapshot detail: itemDetails){
                            Log.d("UserDatabase", "current detail: " + detail.getKey());

                            switch (detail.getKey()){
                                case "imagePath":
                                    temp.setImagePath(detail.getValue().toString());
                                    break;

                                case "imageTitle":
                                    temp.setImageTitle(detail.getValue().toString());
                                    break;

                                default: break;
                            }

                            temp.setLabel(labels.getKey().toString());

                            if (sqLiteDB.ImageDao().doesRecordExist(temp.getImagePath(), temp.getImageTitle(), temp.getLabel())){

                            }

                            else {
                                sqLiteDB.ImageDao().insert(temp);
                            }

                            Log.d("UserDatabase", "temp imagePath: " + temp.getImagePath());
                            Log.d("UserDatabase", "temp imageTitle: " + temp.getImageTitle());
                            Log.d("UserDatabase", "temp label: " + temp.getLabel());
                        }
                    }
                }

                progressDialog.dismiss();
            }
        }).addOnFailureListener(new OnFailureListener() {
            @Override
            public void onFailure(@NonNull Exception e) {

            }
        });
    }

    public void  updateUserData(User user) {
        String userId = this.mAuth.getCurrentUser().getUid();

        databaseReference.child("users").child(userId).setValue(user,1).addOnSuccessListener(new OnSuccessListener<Void>() {
            @Override
            public void onSuccess(Void unused) {

            }
        }).addOnFailureListener(new OnFailureListener() {
            @Override
            public void onFailure(@NonNull Exception e) {
                //progressDialog.dismiss();
                Toast.makeText(context, "Error Creating Profile!!", Toast.LENGTH_LONG).show();
            }
        });
    }
}
