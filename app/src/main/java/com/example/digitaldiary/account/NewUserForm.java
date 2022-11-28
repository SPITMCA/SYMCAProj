package com.example.digitaldiary.account;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.FragmentTransaction;

import android.os.Bundle;

import com.example.digitaldiary.R;
import com.example.digitaldiary.ui.ui.form.NameFragment;

public class NewUserForm extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_new_user_form);

        NameFragment nameFragment = new NameFragment(this);

        FragmentTransaction transaction = getSupportFragmentManager().beginTransaction();
        transaction.replace(R.id.fragment_container, nameFragment);
        transaction.addToBackStack(null);
        transaction.commit();
    }
}