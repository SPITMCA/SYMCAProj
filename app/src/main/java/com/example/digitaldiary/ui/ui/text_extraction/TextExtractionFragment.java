package com.example.digitaldiary.ui.ui.text_extraction;

import androidx.lifecycle.ViewModelProvider;

import android.app.Activity;
import android.content.ClipData;
import android.content.ClipboardManager;
import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.os.CountDownTimer;
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

import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

public class TextExtractionFragment extends Fragment {

    private static final int PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE = 100;
    private TextExtractionViewModel mViewModel;

    private View root;

    private ImageView selectedImage;
    private Button chooseImage;
    private EditText textIdentified;

    private LinearLayout text_identified_layout;

    private Button clipboard;

    private ExecutorService executorService;

    private TextExtractionViewModel textExtractionViewModel;

    private String extractedText;

    public static TextExtractionFragment newInstance() {
        return new TextExtractionFragment();
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        root = inflater.inflate(R.layout.text_extraction_fragment, container, false);

        selectedImage = root.findViewById(R.id.selected_imageView);
        chooseImage = root.findViewById(R.id.choose_image);
        textIdentified = root.findViewById(R.id.text_identified_textView);
        text_identified_layout = root.findViewById(R.id.text_identified_layout);
        clipboard = root.findViewById(R.id.copy_to_clipboard);

        extractedText = "";

        clipboard.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (extractedText.isEmpty()){
                    Toast.makeText(root.getContext(), "Please select an image to extract text from!!", Toast.LENGTH_SHORT).show();
                }

                else {
                    ClipboardManager clipboard = (ClipboardManager) root.getContext().getSystemService(Context.CLIPBOARD_SERVICE);
                    ClipData clip = ClipData.newPlainText("digital_diary", extractedText);
                    clipboard.setPrimaryClip(clip);

                    Toast.makeText(root.getContext(), "Text copied to clipboard!!", Toast.LENGTH_LONG).show();
                }
            }
        });

        chooseImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Intent.ACTION_GET_CONTENT);
                intent.addCategory(Intent.CATEGORY_OPENABLE);
                intent.setType("image/*");
                startActivityForResult(Intent.createChooser(intent, "Select Picture"), PHOTO_PICKER_VIDEO_SINGLE_SELECT_REQUEST_CODE);
            }
        });

        return root;
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = new ViewModelProvider(this).get(TextExtractionViewModel.class);
        // TODO: Use the ViewModel
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
                Uri currentUri = data.getData();

                // Do stuff with the photo/video URI.

                Log.d("HomeFragment", "Current URI: " + currentUri.getPath());

                //String path = getPathFromURI(currentUri);

                selectedImage.setImageURI(currentUri);

                executorService = Executors.newFixedThreadPool(3);
                executorService.execute(new Runnable() {
                    @Override
                    public void run() {
                        try {
                            //labelViewModel.startImageAnalysis(currentUri);
                            textExtractionViewModel.startImageAnalysis(currentUri);
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
                        textExtractionViewModel.setText();
                        text_identified_layout.setVisibility(View.VISIBLE);
                        textIdentified.setVisibility(View.VISIBLE);
                        extractedText = textExtractionViewModel.getText();
                        textIdentified.setText(textExtractionViewModel.getText());
                        clipboard.setVisibility(View.VISIBLE);
                    }
                }.start();

                return;
        }
    }

    @Override
    public void onAttach(@NonNull Context context) {
        super.onAttach(context);
        textExtractionViewModel = new ViewModelProvider(this).get(TextExtractionViewModel.class);
    }
}