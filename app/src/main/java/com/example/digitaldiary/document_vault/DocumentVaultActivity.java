package com.example.digitaldiary.document_vault;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.FileProvider;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.pdf.PdfDocument;
import android.net.Uri;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.os.Environment;
import android.os.StrictMode;
import android.provider.OpenableColumns;
import android.util.Log;
import android.view.DragEvent;
import android.view.View;
import android.widget.Button;
import android.widget.GridLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.digitaldiary.R;
import com.example.digitaldiary.adapters.ListFoundPhotosAdapter;
import com.example.digitaldiary.common.FileUtils;
import com.example.digitaldiary.common.SharedPreferences;
import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.repository.ImagesDatabase;
import com.example.digitaldiary.repository.SQLiteDB;
import com.example.digitaldiary.repository.Storage;
import com.google.firebase.auth.FirebaseAuth;
import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Image;
import com.itextpdf.text.pdf.PdfWriter;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

public class DocumentVaultActivity extends AppCompatActivity {

    private static final int PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE = 200;
    private Uri currentUri;
    private TextView vaultName;
    private SharedPreferences sharedPreferences;
    private FirebaseAuth mAuth;
    private RecyclerView photosRecyclerView;
    private ListFoundPhotosAdapter listFoundPhotosAdapter;
    private SQLiteDB sqLiteDB;
    private ArrayList<ImageDataModel> images;
    private GridLayoutManager gridLayoutManager;
    //private ExtendedFloatingActionButton fab;
    private Button addImage, createPDF;
    private Storage storage;
    private ImagesDatabase imagesDatabase;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_document_vault);

        images = new ArrayList<>();

        vaultName = findViewById(R.id.vault_name_textView);
        //fab = findViewById(R.id.add_image_fab);

        addImage = findViewById(R.id.addImage);
        createPDF = findViewById(R.id.createPDF);

        sharedPreferences = new SharedPreferences(this);
        sqLiteDB = SQLiteDB.getInstance(this);

        mAuth = FirebaseAuth.getInstance();
        storage = new Storage(this);
        imagesDatabase = new ImagesDatabase(this);

        vaultName.setText(sharedPreferences.getUserData(mAuth.getCurrentUser().getUid()).getDocumentVault().getName());

        images = (ArrayList<ImageDataModel>) sqLiteDB.ImageDao().getImagesMatchingQuery("document_vault");

        initializeRecyclerView();

        addImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Intent.ACTION_GET_CONTENT);
                intent.addCategory(Intent.CATEGORY_OPENABLE);
                intent.setType("image/*");
                startActivityForResult(Intent.createChooser(intent, "Select Picture"), PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE);
            }
        });

        createPDF.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try {
                    createPDFWithImages();
                } catch (FileNotFoundException e) {
                    e.printStackTrace();
                    Log.d("DocumentVault", e.getMessage());
                } catch (DocumentException | IOException e) {
                    e.printStackTrace();
                    Log.d("DocumentVault", e.getMessage());
                }
            }
        });
    }

    private void createPDFWithImages() throws IOException, DocumentException {
        List<ImageDataModel> images = sqLiteDB.ImageDao().getImagesMatchingQuery("document_vault");

        Log.d("DocumentVault", "images size: " + images.size());

        Document document = new Document();

        String directoryPath = Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_DOWNLOADS).toString();

        PdfWriter.getInstance(document, new FileOutputStream(directoryPath + "/document_vault_images.pdf")); //  Change pdf's name.

        document.open();

        for (int i = 0; i < images.size(); i++) {
            Image image = Image.getInstance(images.get(i).getImagePath());  // Change image's name and extension.

            float scaler = ((document.getPageSize().getWidth() - document.leftMargin()
                    - document.rightMargin() - 0) / image.getWidth()) * 100; // 0 means you have no indentation. If you have any, change it.
            image.scalePercent(scaler);
            image.setAlignment(Image.ALIGN_CENTER | Image.ALIGN_TOP);

            document.add(image);
        }

        document.close();

        Toast.makeText(this, "PDF Created Successfully!", Toast.LENGTH_SHORT).show();
        Toast.makeText(this, "You can view it in downloads directory!", Toast.LENGTH_LONG).show();
    }

    // onActivityResult() handles callbacks from the photo picker.
    @Override
    protected void onActivityResult(
            int requestCode, int resultCode, final Intent data) {

        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode != Activity.RESULT_OK) {
            // Handle error
            return;
        }

        switch (requestCode) {
            case PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE:
                // Get photo picker response for single select.
                currentUri = data.getData();

                // Do stuff with the photo/video URI.

                Log.d("HomeFragment", "Current URI: " + currentUri.getPath());

                uploadImageToCloud();

                return;
        }
    }

    private void initializeRecyclerView() {
        photosRecyclerView = findViewById(R.id.photos_recyclerView);

        gridLayoutManager = new GridLayoutManager(this, 4);
        gridLayoutManager.setOrientation(GridLayoutManager.VERTICAL);
        listFoundPhotosAdapter = new ListFoundPhotosAdapter(this, images);

        photosRecyclerView.setLayoutManager(gridLayoutManager);
        photosRecyclerView.setAdapter(listFoundPhotosAdapter);
    }

    private void uploadImageToCloud(){
       String downloadUrl = storage.uploadImageToStorage(currentUri);
        imagesDatabase.uploadImageDetails("document_vault", FileUtils.getPath(getApplicationContext(), currentUri), downloadUrl);

        Toast.makeText(this, "Upload to cloud complete!", Toast.LENGTH_LONG).show();

        new CountDownTimer(2000, 1000) {

            public void onTick(long millisUntilFinished) {
                Toast.makeText(getApplicationContext(), "Saving your image...", Toast.LENGTH_SHORT).show();
            }

            public void onFinish() {
                sqLiteDB.ImageDao().insert(new ImageDataModel(getFileName(), FileUtils.getPath(getApplicationContext(), currentUri), "document_vault", "", ""));
                Toast.makeText(getApplicationContext(), "Saved to Device Successfully!!", Toast.LENGTH_LONG).show();
            }
        }.start();
    }

    @SuppressLint("Range")
    public String getFileName() {
        String result = null;
        if (currentUri.getScheme().equals("content")) {
            Cursor cursor = this.getContentResolver().query(currentUri, null, null, null, null);
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
}