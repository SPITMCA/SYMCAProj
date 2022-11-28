package com.example.digitaldiary.repository;

import android.content.Context;
import android.os.CountDownTimer;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.models.ImageWithFilterParent;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.firestore.FirebaseFirestore;

import java.util.ArrayList;
import java.util.Map;
import java.util.Objects;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

public class ImagesDatabase {
    private static final String TAG = "ImagesDatabase";
    private Context context;
    private FirebaseAuth mAuth;
    private FirebaseFirestore firebaseFirestore;
    private Map<String, ArrayList<ImageDataModel>> images;
    private DatabaseReference firebaseDatabase;
    private Storage storage;

    public ImagesDatabase() {
        this.storage = new Storage(context);
        this.mAuth = FirebaseAuth.getInstance();
        this.firebaseFirestore = FirebaseFirestore.getInstance();
        this.firebaseDatabase = FirebaseDatabase.getInstance().getReference();
    }

    public ImagesDatabase(Context context) {
        this.context = context;
        this.storage = new Storage(context);
        this.mAuth = FirebaseAuth.getInstance();
        this.firebaseFirestore = FirebaseFirestore.getInstance();
        this.firebaseDatabase = FirebaseDatabase.getInstance().getReference();
    }

    public ImagesDatabase(Map<String, ArrayList<ImageDataModel>> images) {
        Log.d("ImagesDatabase", "images: " + images.size());
        this.mAuth = FirebaseAuth.getInstance();
        this.firebaseFirestore = FirebaseFirestore.getInstance();
        this.images = images;
    }

    public void uploadImageDetails(String label, String imagePath, String downloadUrl){
        /*for (Map.Entry<String, ArrayList<ImageDataModel>> entry : images.entrySet()){
            for (int i = 0; i < entry.getValue().size(); i++) {
                firebaseFirestore.collection("images").document(Objects.requireNonNull(mAuth.getCurrentUser()).getUid())
                        .collection(entry.getKey()).document(entry.getValue().get(i).getImageTitle()).set(entry.getValue().get(i));
            }
        }*/

        /*for (Map.Entry<String, ArrayList<ImageDataModel>> entry : images.entrySet()){
            for (int i = 0; i < entry.getValue().size(); i++) {
                firebaseDatabase.child("images").child(mAuth.getCurrentUser().getUid())
                        .child(entry.getKey()).child(entry.getValue().get(i).getImageTitle()).setValue(entry.getValue().get(i));
            }
        }*/

        String [] temp = imagePath.split("/");
        String imageTitle = temp[temp.length - 1];

        Log.d("ImagesDatabase", "imageTitle: " + imageTitle);

        String [] firebaseTemp = imageTitle.split("\\.");
        String firebaseTitle = firebaseTemp[0];

        firebaseDatabase.child("images").child(mAuth.getCurrentUser().getUid())
                .child(label).child(firebaseTitle).child("imagePath").setValue(imagePath);

        firebaseDatabase.child("images").child(mAuth.getCurrentUser().getUid())
                .child(label).child(firebaseTitle).child("imageTitle").setValue(imageTitle);

        firebaseDatabase.child("images").child(mAuth.getCurrentUser().getUid())
                .child(label).child(firebaseTitle).child("storageUrl").setValue(downloadUrl);
    }

    public boolean isImageDataAvailable(){
        final boolean[] isPresent = {false};

        /*DocumentReference docRef = this.firebaseFirestore.collection("images").document(mAuth.getCurrentUser().getUid());
        docRef.get().addOnCompleteListener(new OnCompleteListener<DocumentSnapshot>() {
            @Override
            public void onComplete(@NonNull Task<DocumentSnapshot> task) {
                if (task.isSuccessful()) {
                    DocumentSnapshot document = task.getResult();
                    if (document.exists()) {
                        Log.d(TAG, "DocumentSnapshot data: " + document.getData());
                        isPresent[0] = true;
                    } else {
                        Log.d(TAG, "No such document");
                    }
                } else {
                    Log.d(TAG, "get failed with ", task.getException());
                }
            }
        });*/

        firebaseDatabase.child("images").child(mAuth.getCurrentUser().getUid()).get()
                .addOnCompleteListener(new OnCompleteListener<DataSnapshot>() {
                    @Override
                    public void onComplete(@NonNull Task<DataSnapshot> task) {
                        if (!task.isSuccessful()) {
                            Log.d("firebase", "Error getting data", task.getException());
                        }
                        else {
                            Log.d("firebase", String.valueOf(task.getResult().getValue()));
                            isPresent[0] = true;
                        }
                    }
                });


        return isPresent[0];
    }

    public ArrayList<ImageWithFilterParent> downloadImageDataWithFilter(){
        /*DocumentReference documentReference = this.firebaseFirestore.collection("images")
                .document(mAuth.getCurrentUser().getUid()).collection();

        documentReference.get().addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {

            @Override
            public void onComplete(@NonNull Task<QuerySnapshot> task) {
                if (task.isSuccessful()) {
                    for (QueryDocumentSnapshot document : task.getResult()) {
                        Log.d(TAG, document.getId() + " => " + document.getData());
                    }
                } else {
                    Log.d(TAG, "Error getting documents: ", task.getException());
                }
            }
        });*/

        ArrayList<ImageWithFilterParent> images = new ArrayList<>();

        final int[] i = {-1};

        firebaseDatabase.child("images").child(mAuth.getCurrentUser().getUid()).get()
                .addOnSuccessListener(new OnSuccessListener<DataSnapshot>() {
                    @Override
                    public void onSuccess(DataSnapshot dataSnapshot) {
                        Iterable<DataSnapshot> children = dataSnapshot.getChildren();

                        for (DataSnapshot filter: children){
                            i[0] = i[0] + 1;

                            for (DataSnapshot image: filter.getChildren()){
                                ImageDataModel imageDataModel = new ImageDataModel();

                                for (DataSnapshot imageDetails: image.getChildren()){
                                    switch(Objects.requireNonNull(imageDetails.getKey())){
                                        case "imageTitle": imageDataModel.setImageTitle(imageDetails.getValue().toString());
                                                            break;

                                        case "imagePath": imageDataModel.setImagePath(imageDetails.getValue().toString());
                                                            break;

                                        case "imageDate": imageDataModel.setImageDate(imageDetails.getValue().toString());
                                                            break;

                                        case "location": imageDataModel.setLocation(imageDetails.getValue().toString());
                                                            break;

                                        default: break;
                                    }
                                }

                                images.add(i[0], new ImageWithFilterParent(filter.getKey(), imageDataModel));
                            }
                        }
                    }
                });

        return images;
    }

    public void deleteImageRecord(String label, String imagePath){
        String [] temp = imagePath.split("/");
        String imageTitle = temp[temp.length - 1];
        String [] firebaseTemp = imageTitle.split("\\.");
        String firebaseTitle = firebaseTemp[0];

        firebaseDatabase.child("images").child(mAuth.getCurrentUser().getUid())
                .child(label).child(firebaseTitle).removeValue(new DatabaseReference.CompletionListener() {
            @Override
            public void onComplete(@Nullable DatabaseError error, @NonNull DatabaseReference ref) {
                Toast.makeText(context, "Image Record Deleted Successfully!", Toast.LENGTH_SHORT).show();
            }
        });
    }
}
