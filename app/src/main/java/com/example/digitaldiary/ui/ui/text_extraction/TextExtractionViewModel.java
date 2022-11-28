package com.example.digitaldiary.ui.ui.text_extraction;

import android.app.Application;
import android.net.Uri;

import androidx.annotation.NonNull;
import androidx.lifecycle.AndroidViewModel;
import androidx.lifecycle.LiveData;
import androidx.lifecycle.MutableLiveData;
import androidx.lifecycle.ViewModel;

import com.example.digitaldiary.repository.TextExtraction;

public class TextExtractionViewModel extends AndroidViewModel {

    private MutableLiveData<String> extractedText;
    private String text;
    private TextExtraction textExtraction;

    public TextExtractionViewModel(@NonNull Application application) {
        super(application);
        this.extractedText = new MutableLiveData<>();
        this.textExtraction = new TextExtraction(getApplication());
    }

    public void startImageAnalysis(Uri currentUri) {
        try {
            text = textExtraction.analyzeImage(currentUri);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public void setText() {
        this.extractedText.setValue(text);
    }

    public String getText() {
        return this.extractedText.getValue();
    }
}