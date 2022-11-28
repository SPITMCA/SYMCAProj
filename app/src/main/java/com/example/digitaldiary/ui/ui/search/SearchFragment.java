package com.example.digitaldiary.ui.ui.search;

import static android.app.Activity.RESULT_OK;

import android.content.Intent;
import android.os.Bundle;
import android.speech.RecognizerIntent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ScrollView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.core.widget.NestedScrollView;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.ViewModelProvider;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.digitaldiary.R;
import com.example.digitaldiary.adapters.ListAllPhotosAdapter;
import com.example.digitaldiary.adapters.ListFoundPhotosAdapter;
import com.example.digitaldiary.databinding.FragmentSearchBinding;
import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.repository.SQLiteDB;
import com.google.android.material.floatingactionbutton.ExtendedFloatingActionButton;

import java.util.ArrayList;
import java.util.Locale;
import java.util.Objects;

public class SearchFragment extends Fragment {

    private static final int REQUEST_CODE_SPEECH_INPUT = 1;
    private SearchViewModel dashboardViewModel;
    private FragmentSearchBinding binding;
    private RecyclerView listPhotosRecyclerView;
    private GridLayoutManager gridLayoutManager;
    private LinearLayoutManager linearLayoutManager;
    private ListFoundPhotosAdapter listFoundPhotosAdapter;
    private View root;
    private EditText search_query;
    private Button search, clear, showAllImages;
    private ArrayList<ImageDataModel> images;
    private SQLiteDB sqLiteDB;
    private TextView no_photos_textView;
    private ExtendedFloatingActionButton speech_fab;
    private NestedScrollView photosView;
    private ListAllPhotosAdapter listAllPhotosAdapter;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        dashboardViewModel =
                new ViewModelProvider(this).get(SearchViewModel.class);

        binding = FragmentSearchBinding.inflate(inflater, container, false);
        root = binding.getRoot();

        search_query = root.findViewById(R.id.search_query);
        search = root.findViewById(R.id.search);
        images = new ArrayList<>();
        sqLiteDB = SQLiteDB.getInstance(root.getContext());
        no_photos_textView = root.findViewById(R.id.no_photos_textView);
        speech_fab = root.findViewById(R.id.speech_fab);
        clear = root.findViewById(R.id.clear);
        photosView = root.findViewById(R.id.photos_view);
        showAllImages = root.findViewById(R.id.show_all_images);

        search.setOnClickListener(view -> {
            if (search_query.getText().toString().equals("")){
                Toast.makeText(root.getContext(), "Please enter your search query!", Toast.LENGTH_LONG).show();
            }

            else if (search_query.getText().toString().toLowerCase(Locale.ROOT).equals("document_vault") || search_query.getText().toString().toLowerCase(Locale.ROOT).equals("document vault")){
                Toast.makeText(root.getContext(), "Please access your vault from the profile section!", Toast.LENGTH_LONG).show();
            }

            else{
                images = (ArrayList<ImageDataModel>) sqLiteDB.ImageDao().getImagesMatchingQuery(search_query.getText().toString().toLowerCase(Locale.ROOT));

                if (images.size() == 0){
                    no_photos_textView.setVisibility(View.VISIBLE);
                    photosView.setVisibility(View.GONE);
                }

                else {
                    Log.d("SearchFragment", "images size: " + images.size());
                    Log.d("SearchFragment", "image size: " + images.get(0).getImagePath());
                    listFoundPhotosAdapter = new ListFoundPhotosAdapter(root.getContext(), images);
                    photosView.setVisibility(View.VISIBLE);
                    no_photos_textView.setVisibility(View.GONE);
                    setQueryRecyclerView();
                }
            }
        });

        speech_fab.setOnClickListener(view -> {
            Intent intent
                    = new Intent(RecognizerIntent.ACTION_RECOGNIZE_SPEECH);
            intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_MODEL,
                    RecognizerIntent.LANGUAGE_MODEL_FREE_FORM);
            intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE,
                    Locale.getDefault());
            intent.putExtra(RecognizerIntent.EXTRA_PROMPT, "Speak to text");

            try {
                startActivityForResult(intent, REQUEST_CODE_SPEECH_INPUT);
            }
            catch (Exception e) {
                Toast
                        .makeText(root.getContext(), " " + e.getMessage(),
                                Toast.LENGTH_SHORT)
                        .show();
            }
        });

        clear.setOnClickListener(view -> search_query.setText(""));

        showAllImages.setOnClickListener(view -> {
            if (sqLiteDB.ImageDao().getAllLabels().size() == 0){
                no_photos_textView.setVisibility(View.VISIBLE);
                photosView.setVisibility(View.GONE);
            }

            else {
                listAllPhotosAdapter = new ListAllPhotosAdapter(root.getContext());
                photosView.setVisibility(View.VISIBLE);
                no_photos_textView.setVisibility(View.GONE);
                setShowAllImagesRecyclerView();
            }
        });

        return root;
    }

    private void setQueryRecyclerView() {
        listPhotosRecyclerView = root.findViewById(R.id.list_content_recyclerView);
        gridLayoutManager = new GridLayoutManager(root.getContext(), 4);
        gridLayoutManager.setOrientation(GridLayoutManager.VERTICAL);
        listPhotosRecyclerView.setLayoutManager(gridLayoutManager);
        listPhotosRecyclerView.setAdapter(listFoundPhotosAdapter);
        listFoundPhotosAdapter.notifyDataSetChanged();
    }

    private void setShowAllImagesRecyclerView(){
        listPhotosRecyclerView = root.findViewById(R.id.list_content_recyclerView);
        linearLayoutManager = new LinearLayoutManager(root.getContext());
        linearLayoutManager.setOrientation(LinearLayoutManager.VERTICAL);
        listPhotosRecyclerView.setLayoutManager(linearLayoutManager);
        listPhotosRecyclerView.setAdapter(listAllPhotosAdapter);
        listAllPhotosAdapter.notifyDataSetChanged();
    }

    @Override
    public void onDestroyView() {
        super.onDestroyView();
        binding = null;
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode,
                                    @Nullable Intent data)
    {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == REQUEST_CODE_SPEECH_INPUT) {
            if (resultCode == RESULT_OK && data != null) {
                ArrayList<String> result = data.getStringArrayListExtra(
                        RecognizerIntent.EXTRA_RESULTS);
                search_query.setText(
                        Objects.requireNonNull(result).get(0));

                search.callOnClick();
            }
        }
    }
}