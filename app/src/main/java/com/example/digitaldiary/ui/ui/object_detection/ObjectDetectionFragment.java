package com.example.digitaldiary.ui.ui.object_detection;

import androidx.lifecycle.ViewModelProvider;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.net.Uri;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.os.CountDownTimer;
import android.provider.OpenableColumns;
import android.speech.tts.TextToSpeech;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.digitaldiary.R;
import com.example.digitaldiary.common.FileUtils;
import com.example.digitaldiary.common.SharedPreferences;
import com.example.digitaldiary.common.ShowAlertDialog;
import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.repository.ImagesDatabase;
import com.example.digitaldiary.repository.SQLiteDB;
import com.example.digitaldiary.repository.Storage;
import com.example.digitaldiary.ui.ui.label.LabelViewModel;
import com.google.android.material.floatingactionbutton.ExtendedFloatingActionButton;
import com.google.firebase.auth.FirebaseAuth;

import java.util.Locale;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

public class ObjectDetectionFragment extends Fragment {

    private static final int PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE = 100;
    private ObjectDetectionViewModel mViewModel;

    private TextView object_textView;
    private Button chooseImage;
    private LinearLayout object_layout;
    private ImageView selected_image;

    private ExecutorService executorService;

    private ObjectDetectionViewModel objectDetectionViewModel;

    private View root;

    private EditText objectEntered;
    private Button saveToDevice, saveToCloud;

    private SQLiteDB sqLiteDB;

    private Uri currentUri;

    private Storage storage;
    private ImagesDatabase imagesDatabase;

    private ExtendedFloatingActionButton fab;

    private TextToSpeech textToSpeech;

    private SharedPreferences sharedPreferences;
    private FirebaseAuth mAuth;

    public static ObjectDetectionFragment newInstance() {
        return new ObjectDetectionFragment();
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        root = inflater.inflate(R.layout.object_detection_fragment, container, false);

        object_textView = root.findViewById(R.id.objects_textView);
        chooseImage = root.findViewById(R.id.choose_image);
        object_layout = root.findViewById(R.id.objects_layout);
        selected_image = root.findViewById(R.id.selected_imageView);
        objectEntered = root.findViewById(R.id.object_entered);
        saveToDevice = root.findViewById(R.id.save_to_device);
        saveToCloud = root.findViewById(R.id.save_to_cloud);
        fab = root.findViewById(R.id.speech_fab);

        sqLiteDB = SQLiteDB.getInstance(root.getContext());

        mAuth = FirebaseAuth.getInstance();

        storage = new Storage(root.getContext());
        imagesDatabase = new ImagesDatabase(root.getContext());
        sharedPreferences = new SharedPreferences(root.getContext());

        chooseImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Intent.ACTION_GET_CONTENT);
                intent.addCategory(Intent.CATEGORY_OPENABLE);
                intent.setType("image/*");
                startActivityForResult(Intent.createChooser(intent, "Select Picture"), PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE);
            }
        });

        saveToDevice.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (objectEntered.getText().toString().equals("")){
                    Toast.makeText(root.getContext(), "Please enter your label!!", Toast.LENGTH_LONG).show();
                }
                else {
                    if (sqLiteDB.ImageDao().doesRecordExist(FileUtils.getPath(root.getContext(), currentUri), getFileName(), objectEntered.getText().toString())){
                        Toast.makeText(root.getContext(), "Record already exists!", Toast.LENGTH_LONG).show();
                    }

                    else {
                        new CountDownTimer(2000, 1000) {

                            public void onTick(long millisUntilFinished) {
                                Toast.makeText(root.getContext(), "Saving your image...", Toast.LENGTH_SHORT).show();
                            }

                            public void onFinish() {
                                sqLiteDB.ImageDao().insert(new ImageDataModel(getFileName(), FileUtils.getPath(root.getContext(), currentUri), objectEntered.getText().toString().toLowerCase(Locale.ROOT), "", ""));
                                Toast.makeText(root.getContext(), "Saved to Device Successfully!!", Toast.LENGTH_LONG).show();
                            }
                        }.start();
                    }
                }
            }
        });

        saveToCloud.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (objectEntered.getText().toString().equals("")){
                    Toast.makeText(root.getContext(), "Please enter your label!!", Toast.LENGTH_LONG).show();
                }

                else if (!sharedPreferences.getUserData(mAuth.getCurrentUser().getUid()).isTakeBackup()){
                    ShowAlertDialog.showAlertDialog(root.getContext(), "Please enable backup from your profile section to save to cloud!", "You cannot upload to cloud!");
                }

                else if (sharedPreferences.getUserData(mAuth.getCurrentUser().getUid()).getImageQuality().equals("NA")){
                    ShowAlertDialog.showAlertDialog(root.getContext(), "Please select your image quality from the profile section!", "Please select your image quality from the profile section!");
                }

                else {
                    if (sqLiteDB.ImageDao().doesRecordExist(FileUtils.getPath(root.getContext(), currentUri), getFileName(), objectEntered.getText().toString())){
                        Toast.makeText(root.getContext(), "Record already exists!", Toast.LENGTH_LONG).show();
                    }

                    else {
                        String downloadUrl = storage.uploadImageToStorage(currentUri);
                        imagesDatabase.uploadImageDetails(objectEntered.getText().toString().toLowerCase(Locale.ROOT), FileUtils.getPath(root.getContext(), currentUri), downloadUrl);

                        Toast.makeText(root.getContext(), "Upload to cloud complete!", Toast.LENGTH_LONG).show();

                        new CountDownTimer(2000, 1000) {

                            public void onTick(long millisUntilFinished) {
                                Toast.makeText(root.getContext(), "Saving your image...", Toast.LENGTH_SHORT).show();
                            }

                            public void onFinish() {
                                sqLiteDB.ImageDao().insert(new ImageDataModel(getFileName(), FileUtils.getPath(root.getContext(), currentUri), objectEntered.getText().toString().toLowerCase(Locale.ROOT), "", ""));
                                Toast.makeText(root.getContext(), "Saved to Device Successfully!!", Toast.LENGTH_LONG).show();
                            }
                        }.start();
                    }
                }
            }
        });

        textToSpeech = new TextToSpeech(root.getContext(), new TextToSpeech.OnInitListener() {
            @Override
            public void onInit(int i) {

                // if No error is found then only it will run
                if(i!=TextToSpeech.ERROR){
                    // To Choose language of speech
                    textToSpeech.setLanguage(Locale.ENGLISH);
                }
            }
        });

        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (object_textView.getText().toString().equals("")){
                    textToSpeech.speak("No objects detected!", TextToSpeech.QUEUE_FLUSH,null);
                }

                else
                    textToSpeech.speak(object_textView.getText().toString(), TextToSpeech.QUEUE_FLUSH,null);
            }
        });

        return root;
    }

    // onActivityResult() handles callbacks from the photo picker.
    @Override
    public void onActivityResult(
            int requestCode, int resultCode, final Intent data) {

        if (resultCode != Activity.RESULT_OK) {
            // Handle error
            return;
        }

        switch(requestCode) {
            case PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE:
                // Get photo picker response for single select.
                currentUri = data.getData();

                // Do stuff with the photo/video URI.

                Log.d("HomeFragment", "Current URI: " + currentUri.getPath());

                //String path = getPathFromURI(currentUri);

                selected_image.setImageURI(currentUri);

                executorService = Executors.newFixedThreadPool(3);
                executorService.execute(new Runnable() {
                    @Override
                    public void run() {
                        try {
                            objectDetectionViewModel.startImageAnalysis(currentUri);
                        } catch (Exception e) {
                            e.printStackTrace();
                        }

                        //Log.d("HomeFragment", "" + allImages.size());
                    }
                });

                try {
                    executorService.awaitTermination(2, TimeUnit.SECONDS);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }

                new CountDownTimer(2000, 1000) {

                    public void onTick(long millisUntilFinished) {
                    }

                    public void onFinish() {
                        objectDetectionViewModel.setObjects();
                        object_layout.setVisibility(View.VISIBLE);
                        object_textView.setVisibility(View.VISIBLE);
                        object_textView.setText(objectDetectionViewModel.getObjects());
                    }
                }.start();

                return;
        }
    }

    @SuppressLint("Range")
    public String getFileName() {
        String result = null;
        if (currentUri.getScheme().equals("content")) {
            Cursor cursor = root.getContext().getContentResolver().query(currentUri, null, null, null, null);
            try {
                if (cursor != null && cursor.moveToFirst()) {
                    result = cursor.getString(cursor.getColumnIndex(OpenableColumns.DISPLAY_NAME));
                }
            } finally {
                cursor.close();
            }
        }
        if (result == null) {
            result = currentUri.getPath();
            int cut = result.lastIndexOf('/');
            if (cut != -1) {
                result = result.substring(cut + 1);
            }
        }

        Log.d("LabelFragment", "GetFileName: " + result);

        return result;
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = new ViewModelProvider(this).get(ObjectDetectionViewModel.class);
        // TODO: Use the ViewModel
    }

    @Override
    public void onAttach(@NonNull Context context) {
        super.onAttach(context);
        objectDetectionViewModel = new ViewModelProvider(this).get(ObjectDetectionViewModel.class);
    }
}