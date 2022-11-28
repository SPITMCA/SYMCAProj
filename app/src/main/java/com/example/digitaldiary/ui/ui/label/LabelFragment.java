package com.example.digitaldiary.ui.ui.label;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.os.Environment;
import android.os.Handler;
import android.provider.MediaStore;
import android.provider.OpenableColumns;
import android.speech.tts.TextToSpeech;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.ScrollView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.core.content.FileProvider;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;
import androidx.lifecycle.ViewModelProvider;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import com.example.digitaldiary.BuildConfig;
import com.example.digitaldiary.DisplayFullImageActivity;
import com.example.digitaldiary.R;
import com.example.digitaldiary.common.FileUtils;
import com.example.digitaldiary.common.ReadInternalMemory;
import com.example.digitaldiary.common.SharedPreferences;
import com.example.digitaldiary.common.ShowAlertDialog;
import com.example.digitaldiary.databinding.FragmentLabelBinding;
import com.example.digitaldiary.homepage_recycler_adapters.ImageWithFilterAdapter;
import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.models.User;
import com.example.digitaldiary.repository.ImageLocationAnalyzer;
import com.example.digitaldiary.repository.ImagesDatabase;
import com.example.digitaldiary.repository.SQLiteDB;
import com.example.digitaldiary.repository.Storage;
import com.example.digitaldiary.repository.UserDatabase;
import com.example.digitaldiary.ui.ui.profile.ProfileFragment;
import com.google.android.material.floatingactionbutton.ExtendedFloatingActionButton;
import com.google.android.material.snackbar.Snackbar;
import com.google.firebase.auth.FirebaseAuth;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;
import java.util.Locale;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.Future;
import java.util.concurrent.TimeUnit;

public class LabelFragment extends Fragment {

    private static final int REQUEST_ID_MULTIPLE_PERMISSIONS = 100;
    private static final int PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE = 200;
    private static final int PIC_ID = 300;
    private LabelViewModel labelViewModel;
    private FragmentLabelBinding binding;
    private ArrayList<ImageDataModel> allImages;
    private AlertDialog.Builder alertBuilder;
    private List<String> listPermissionsNeeded = new ArrayList<>();
    private ExecutorService executorService;
    private List<Future<?>> futures = new ArrayList<Future<?>>();
    private ProgressDialog progressDialog;
    private Context context;
    private RecyclerView photosWithFilter;
    private Spinner filterSpinner;
    private ArrayList<String> filters;
    private ReadInternalMemory readInternalMemory;
    private LinearLayoutManager linearLayoutManager;
    private ImageWithFilterAdapter imageWithFilterAdapter;
    private SwipeRefreshLayout swipeRefreshLayout;
    private Button pickImage, takeImage;
    private ImageView selectedImage;
    private LinearLayout labelsLayout;
    private TextView labelsTextView;
    private ImageLocationAnalyzer imageLocationAnalyzer;
    private Button saveToDevice, saveToCloud;
    private SQLiteDB sqLiteDB;
    private Uri currentUri;
    private View root;
    private EditText label_entered;
    private User user;
    private SharedPreferences sharedPreferences;
    private FirebaseAuth mAuth;
    private UserDatabase userDatabase;
    private ExtendedFloatingActionButton speech_fab;
    private TextToSpeech textToSpeech;
    private Storage storage;
    private ImagesDatabase imagesDatabase;
    private LinearLayout parentLinearLayout;

    public LabelFragment() {
    }

    public LabelFragment(Context context){
        this.context = context;
        this.progressDialog = new ProgressDialog(context);
    }

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        labelViewModel =
                new ViewModelProvider(this).get(LabelViewModel.class);

        binding = FragmentLabelBinding.inflate(inflater, container, false);
        root = binding.getRoot();

        allImages = new ArrayList<>();
        filters = new ArrayList<>();
        alertBuilder = new AlertDialog.Builder(requireActivity());

        pickImage = root.findViewById(R.id.choose_image);
        takeImage = root.findViewById(R.id.take_image);
        selectedImage = root.findViewById(R.id.selected_imageView);

        labelsLayout = root.findViewById(R.id.labels_layout);
        labelsTextView = root.findViewById(R.id.labels_textView);

        speech_fab = root.findViewById(R.id.speech_fab);

        imageLocationAnalyzer = new ImageLocationAnalyzer(root.getContext());

        saveToDevice = root.findViewById(R.id.save_to_device);
        saveToCloud = root.findViewById(R.id.save_to_cloud);

        parentLinearLayout = root.findViewById(R.id.pull_to_refresh_layout);

        sqLiteDB = SQLiteDB.getInstance(root.getContext());
        mAuth = FirebaseAuth.getInstance();
        userDatabase = new UserDatabase(root.getContext());

        storage = new Storage(root.getContext());

        label_entered = root.findViewById(R.id.label_entered);

        sharedPreferences = new SharedPreferences(root.getContext());

        user = sharedPreferences.getUserData(mAuth.getCurrentUser().getUid());

        imagesDatabase = new ImagesDatabase(root.getContext());

        SwipeRefreshLayout.OnRefreshListener swipeRefreshListener = new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                imageWithFilterAdapter.notifyDataSetChanged();
                //movieImageAdapter.notifyDataSetChanged();
            }
        };

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

        /*AsyncTask asyncTask = new AsyncTask() {
            @Override
            protected Object doInBackground(Object[] objects) {
                homeViewModel.setImageWithFilterParent();
                return null;
            }
        };*/


        /*linearLayoutManager = new LinearLayoutManager(root.getContext());
        imageWithFilterAdapter = new ImageWithFilterAdapter(homeViewModel.getImageWithFilterParent().getValue(), root.getContext());

        photosWithFilter = root.findViewById(R.id.photos_with_filter_view);
        photosWithFilter.setLayoutManager(linearLayoutManager);
        photosWithFilter.setAdapter(imageWithFilterAdapter);*/

        /*swipeRefreshLayout = root.findViewById(R.id.pull_to_refresh_layout);
        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                imageWithFilterAdapter.notifyDataSetChanged();
                //movieImageAdapter.notifyDataSetChanged();
                swipeRefreshLayout.setRefreshing(false);
                //Log.d("HomeFragment: ", "ShowImages size: " + showImages.size());
            }
        });*/

        if (ContextCompat.checkSelfPermission(requireActivity(),
                Manifest.permission.WRITE_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED && ContextCompat.checkSelfPermission(requireActivity(),
                Manifest.permission.READ_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED){
            showAlertDialog();
            listPermissionsNeeded.add(Manifest.permission.READ_EXTERNAL_STORAGE);
            listPermissionsNeeded.add(Manifest.permission.WRITE_EXTERNAL_STORAGE);
            checkAndRequestPermissions(requireActivity());
        }

        else{
            /*Runnable worker1 = new ReadInternalMemory(requireActivity());
            //Runnable worker2 = new ReadInternalMemory(requireActivity());
            //Runnable worker3 = new ReadInternalMemory(requireActivity());

            Future<?> f = executorService.submit(worker1);

            futures.add(f);

            for(Future<?> future : futures) {
                try {
                    future.get(); // get will block until the future is done
                } catch (ExecutionException e) {
                    Log.d("HomeFragment", "In catch of ExecutionException!! " + e.getMessage());
                } catch (InterruptedException e) {
                    Log.d("HomeFragment", "In catch of InterruptedException!! " + e.getMessage());
                }
            }

            // B) Check if all runnables are done (non-blocking)
            boolean allDone = true;
            for(Future<?> future : futures){
                allDone &= future.isDone(); // check if future is done
            }*/

            /*filterSpinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
                @Override
                public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                    //Toast.makeText(requireActivity(), "" + adapterView.getItemAtPosition(i).toString(), Toast.LENGTH_LONG).show();
                }

                @Override
                public void onNothingSelected(AdapterView<?> adapterView) {

                }
            });*/

            Log.d("HomeFragment", "In else block");

            /*progressDialog = new ProgressDialog(requireActivity());
            progressDialog.setMessage("Please wait while we scan your internal storage!!");
            progressDialog.show();*/

            /*executorService = Executors.newFixedThreadPool(3);
            executorService.execute(new Runnable() {
                @Override
                public void run() {
                    allImages = new ReadInternalMemory().getAllImages(requireActivity());

                    Log.d("HomeFragment", "" + allImages.size());
                }
            });

            try {
                executorService.awaitTermination(2000, TimeUnit.MILLISECONDS);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }*/

            Log.d("HomeFragment", "" + allImages.size());

            for (int i = 0; i < allImages.size(); i++){
                Log.d("HomeFragment", "" + allImages.get(i).getImageTitle() + " " + allImages.get(i).getImagePath());
            }

            //progressDialog.dismiss();

            pickImage.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(Intent.ACTION_GET_CONTENT);
                    intent.addCategory(Intent.CATEGORY_OPENABLE);
                    intent.setType("image/*");
                    startActivityForResult(Intent.createChooser(intent, "Select Picture"), PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE);
                }
            });

            takeImage.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    if (checkCameraPermission()) {
                        Intent camera_intent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                        /*File dir = Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_DCIM);

                        File output = new File(dir, "IMG_" + Calendar.getInstance().getTime());
                        camera_intent.putExtra(MediaStore.EXTRA_OUTPUT, FileProvider.getUriForFile(root.getContext(), root.getContext().getPackageName() + ".provider", output));
                        camera_intent.putExtra(Intent.EXTRA_STREAM, Uri.fromFile(output));
                        camera_intent.addFlags(Intent.FLAG_GRANT_READ_URI_PERMISSION);*/

                        File photo = new File (Environment.getExternalStorageDirectory() + "/DCIM/Camera/", "IMG_" + Calendar.getInstance().getTime() + ".jpg");
                        camera_intent.addFlags(Intent.FLAG_GRANT_READ_URI_PERMISSION);
                        currentUri = FileProvider.getUriForFile(root.getContext(), root.getContext().getPackageName() + ".provider", photo);
                        camera_intent.putExtra(MediaStore.EXTRA_OUTPUT, currentUri);
                        startActivityForResult(camera_intent, PIC_ID);
                    }

                    else{
                        Snackbar.make(parentLinearLayout, "Please grant camera permission to use this feature!", Snackbar.LENGTH_LONG).show();
                    }
                }
            });

            saveToDevice.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    if (label_entered.getText().toString().equals("")){
                        Toast.makeText(root.getContext(), "Please enter your label!!", Toast.LENGTH_LONG).show();
                    }
                    else {
                        Log.d("LabelFragment", "duplicate records: " + sqLiteDB.ImageDao().doesRecordExist(FileUtils.getPath(root.getContext(), currentUri), getFileName(), label_entered.getText().toString()));
                        if (sqLiteDB.ImageDao().doesRecordExist(FileUtils.getPath(root.getContext(), currentUri), getFileName(), label_entered.getText().toString())){
                            Toast.makeText(root.getContext(), "Record already exists!", Toast.LENGTH_LONG).show();
                        }

                        else {
                            new CountDownTimer(2000, 1000) {

                                public void onTick(long millisUntilFinished) {
                                    Toast.makeText(root.getContext(), "Saving your image...", Toast.LENGTH_SHORT).show();
                                }

                                public void onFinish() {
                                    sqLiteDB.ImageDao().insert(new ImageDataModel(getFileName(), FileUtils.getPath(root.getContext(), currentUri), label_entered.getText().toString().toLowerCase(Locale.ROOT), "", ""));
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
                    if (label_entered.getText().toString().equals("")){
                        Toast.makeText(root.getContext(), "Please enter your label!!", Toast.LENGTH_LONG).show();
                    }

                    else if (!sharedPreferences.getUserData(mAuth.getCurrentUser().getUid()).isTakeBackup()){
                        ShowAlertDialog.showAlertDialog(root.getContext(), "Please enable backup from your profile section to save to cloud!", "You cannot upload to cloud!");
                    }

                    else if (sharedPreferences.getUserData(mAuth.getCurrentUser().getUid()).getImageQuality().equals("NA")){
                        ShowAlertDialog.showAlertDialog(root.getContext(), "Please select your image quality from the profile section!", "Please select your image quality from the profile section!");
                    }

                    else {
                        if (sqLiteDB.ImageDao().doesRecordExist(FileUtils.getPath(root.getContext(), currentUri), getFileName(), label_entered.getText().toString())){
                            Toast.makeText(root.getContext(), "Record already exists!", Toast.LENGTH_LONG).show();
                        }

                        else {
                            String downloadUrl = storage.uploadImageToStorage(currentUri);
                            imagesDatabase.uploadImageDetails(label_entered.getText().toString().toLowerCase(Locale.ROOT), FileUtils.getPath(root.getContext(), currentUri), downloadUrl);

                            Toast.makeText(root.getContext(), "Upload to cloud complete!", Toast.LENGTH_LONG).show();

                            new CountDownTimer(2000, 1000) {

                                public void onTick(long millisUntilFinished) {
                                    Toast.makeText(root.getContext(), "Saving your image...", Toast.LENGTH_SHORT).show();
                                }

                                public void onFinish() {
                                    sqLiteDB.ImageDao().insert(new ImageDataModel(getFileName(), FileUtils.getPath(root.getContext(), currentUri), label_entered.getText().toString().toLowerCase(Locale.ROOT), "", ""));
                                    Toast.makeText(root.getContext(), "Saved to Device Successfully!!", Toast.LENGTH_LONG).show();
                                }
                            }.start();
                        }
                    }
                }
            });

            speech_fab.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    if (labelsTextView.getText().toString().equals("")){
                        textToSpeech.speak("No labels detected!", TextToSpeech.QUEUE_FLUSH,null);
                    }

                    else {
                        textToSpeech.speak(labelsTextView.getText().toString(), TextToSpeech.QUEUE_FLUSH, null);
                    }
                }
            });
        }

        return root;
    }

    // onActivityResult() handles callbacks from the photo picker.
    @Override
    public void onActivityResult(
            int requestCode, int resultCode, final Intent data) {

        if (resultCode != Activity.RESULT_OK) {
            // Handle error

            Log.d("LabelFragment", "Result Code: " + resultCode);
            //return;
        }

        switch(requestCode) {
            case PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE:
                // Get photo picker response for single select.
                currentUri = data.getData();

                // Do stuff with the photo/video URI.

                Log.d("HomeFragment", "Current URI: " + currentUri.getPath());

                //String path = getPathFromURI(currentUri);

                selectedImage.setImageURI(currentUri);

                user.setNumberOfImagesLabeled(user.getNumberOfImagesLabeled() + 1);

                sharedPreferences.storeUserData(user);
                userDatabase.updateUserData(user);

                executorService = Executors.newFixedThreadPool(3);
                executorService.execute(new Runnable() {
                    @Override
                    public void run() {
                        try {
                            labelViewModel.startImageAnalysis(currentUri);
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
                        labelViewModel.setLabels();
                        labelsLayout.setVisibility(View.VISIBLE);
                        labelsTextView.setVisibility(View.VISIBLE);
                        labelsTextView.setText(labelViewModel.getLabels());
                    }
                }.start();

                return;

            case PIC_ID:
                Log.d("LabelFragment", "Inside pic_id case!");

                //Bitmap photo = (Bitmap) data.getExtras().get("data");
                //selectedImage.setImageBitmap(photo);

                try {
                    Bitmap photo = MediaStore.Images.Media.getBitmap(root.getContext().getContentResolver(), currentUri);
                    selectedImage.setImageBitmap(photo);
                } catch (IOException e) {
                    e.printStackTrace();
                }


                //currentUri = FileUtils.getImageUri(root.getContext(), photo);
                //currentUri = data.getData();
                //currentUri = FileProvider.getUriForFile(root.getContext(), root.getContext().getPackageName() + ".provider", FileUtils.bitmapToFile(root.getContext(), photo, "IMG_" + Calendar.getInstance().getTime() ));

                selectedImage.setImageURI(currentUri);

                user.setNumberOfImagesLabeled(user.getNumberOfImagesLabeled() + 1);

                sharedPreferences.storeUserData(user);
                userDatabase.updateUserData(user);

                executorService = Executors.newFixedThreadPool(3);
                executorService.execute(new Runnable() {
                    @Override
                    public void run() {
                        try {
                            labelViewModel.startImageAnalysis(currentUri);
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
                        labelViewModel.setLabels();
                        labelsLayout.setVisibility(View.VISIBLE);
                        labelsTextView.setVisibility(View.VISIBLE);
                        labelsTextView.setText(labelViewModel.getLabels());
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

    private void initializeSpinner() {
        filters.add("Date");
        filters.add("Location");

        ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(requireActivity(), android.R.layout.simple_spinner_item, filters);
        arrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        filterSpinner.setAdapter(arrayAdapter);
    }

    private void showAlertDialog() {
        //Uncomment the below code to Set the message and title from the strings.xml file
        alertBuilder.setMessage(R.string.require_permission_dialog_message) .setTitle(R.string.require_permission_dialog_title);

        //Setting message manually and performing action on button click
        alertBuilder.setMessage("Digital Diary Requires Access to External Storage. Would you like to grant this permission in order to use the app?")
                .setTitle(R.string.require_permission_dialog_title)
                .setCancelable(false)
                .setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        /*requireActivity().finish();
                        Toast.makeText(requireActivity(),"you choose yes action for alertbox",
                                Toast.LENGTH_SHORT).show();*/
                        //checkAndRequestPermissions(requireActivity());
                        ActivityCompat.requestPermissions(requireActivity(), listPermissionsNeeded
                                        .toArray(new String[listPermissionsNeeded.size()]),
                                REQUEST_ID_MULTIPLE_PERMISSIONS);
                    }
                })
                .setNegativeButton("No", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        //  Action for 'NO' Button
                        //dialog.cancel();
                        Toast.makeText(requireActivity(),"You cannot use this app! Quitting!!",
                                Toast.LENGTH_LONG).show();
                        requireActivity().finish();
                    }
                });
        //Creating dialog box
        AlertDialog alert = alertBuilder.create();
        //Setting the title manually
        alert.setTitle("AlertDialogExample");
        alert.show();
    }

    public boolean checkAndRequestPermissions(final Activity context) {
        int WExtstorePermission = ContextCompat.checkSelfPermission(context,
                Manifest.permission.WRITE_EXTERNAL_STORAGE);
        int cameraPermission = ContextCompat.checkSelfPermission(context,
                Manifest.permission.READ_EXTERNAL_STORAGE);
        if (cameraPermission != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.READ_EXTERNAL_STORAGE);
        }
        if (WExtstorePermission != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded
                    .add(Manifest.permission.WRITE_EXTERNAL_STORAGE);
        }
        if (!listPermissionsNeeded.isEmpty()) {
            ActivityCompat.requestPermissions(context, listPermissionsNeeded
                            .toArray(new String[listPermissionsNeeded.size()]),
                    REQUEST_ID_MULTIPLE_PERMISSIONS);
            return false;
        }
        return true;
    }

    public boolean checkCameraPermission(){
        listPermissionsNeeded.clear();

        int cameraPermission = ContextCompat.checkSelfPermission(root.getContext(),
                Manifest.permission.CAMERA);

        if (cameraPermission != PackageManager.PERMISSION_GRANTED) {
            listPermissionsNeeded.add(Manifest.permission.CAMERA);
        }

        if (!listPermissionsNeeded.isEmpty()) {
            ActivityCompat.requestPermissions((Activity) root.getContext(), listPermissionsNeeded
                            .toArray(new String[listPermissionsNeeded.size()]),
                    REQUEST_ID_MULTIPLE_PERMISSIONS);
            return false;
        }

        return true;
    }

    @Override
    public void onRequestPermissionsResult(int requestCode,String[] permissions, int[] grantResults) {
        switch (requestCode) {
            case REQUEST_ID_MULTIPLE_PERMISSIONS:
                if (ContextCompat.checkSelfPermission(requireActivity(),
                        Manifest.permission.READ_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED) {
                    Toast.makeText(requireActivity(),
                            "Digital Diary Requires Access to External Storage.", Toast.LENGTH_SHORT)
                            .show();
                } else if (ContextCompat.checkSelfPermission(requireActivity(),
                        Manifest.permission.WRITE_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED) {
                    Toast.makeText(requireActivity(),
                            "Digital Diary Requires Access to External Storage.",
                            Toast.LENGTH_SHORT).show();
                } else {
                    //chooseImage(requireActivity());
                }
                break;
        }
    }

    @Override
    public void onDestroyView() {
        super.onDestroyView();
        binding = null;
    }

    @Override
    public void onAttach(@NonNull Context context) {
        super.onAttach(context);

        labelViewModel =
                new ViewModelProvider(this).get(LabelViewModel.class);

        /*executorService = Executors.newFixedThreadPool(3);
        executorService.execute(new Runnable() {
            @Override
            public void run() {
                try {
                    homeViewModel.loadImages((Activity) context);
                } catch (IOException e) {
                    e.printStackTrace();
                }

                //Log.d("HomeFragment", "" + allImages.size());
            }
        });

        try {
            executorService.awaitTermination(20, TimeUnit.SECONDS);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }*/

        //homeViewModel.setImageWithFilterParent();

        //homeViewModel.setImageWithFilterParent();

        //readInternalMemory = new ReadInternalMemory();

        //userDatabase = new UserDatabase(context);

        //showsSharedPreferences = new ShowsSharedPreferences(context);

        //selectedGenres = showsSharedPreferences.getStoredGenres();

        /*if (selectedGenres.get(0) == null){
            userDatabase.getSelectedGenres();
            selectedGenres = showsSharedPreferences.getStoredGenres();
        }*/

        //homeViewModel.setImages1(selectedGenres.get(0));
        //homeViewModel.setImages2(selectedGenres.get(1));
        //homeViewModel.setImages3(selectedGenres.get(2));

        /*Thread thread = new Thread(){
            @Override
            public void run() {
                super.run();

                showImages = storage.downloadShowImages(selectedGenres.get(0));
                showImages = storage.downloadShowImages(selectedGenres.get(1));
                showImages = storage.downloadShowImages(selectedGenres.get(2));

                allImages = readInternalMemory.getAllImages((Activity) context);
            }
        };*/

        /*executorService = Executors.newFixedThreadPool(3);
        executorService.execute(new Runnable() {
            @Override
            public void run() {
                allImages = new ReadInternalMemory().getAllImages(requireActivity());

                Log.d("HomeFragment", "" + allImages.size());
            }
        });

        try {
            executorService.awaitTermination(2000, TimeUnit.MILLISECONDS);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }*/
    }

    @Override
    public void onStart() {
        super.onStart();
        //homeViewModel.setImageWithFilterParent();
    }
}