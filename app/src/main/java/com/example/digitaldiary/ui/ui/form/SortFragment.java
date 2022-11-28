package com.example.digitaldiary.ui.ui.form;

import androidx.core.content.ContextCompat;
import androidx.lifecycle.ViewModelProvider;

import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.digitaldiary.R;
import com.example.digitaldiary.common.NetworkCheck;
import com.example.digitaldiary.common.SharedPreferences;
import com.example.digitaldiary.models.User;
import com.example.digitaldiary.repository.UserDatabase;
import com.google.firebase.auth.FirebaseAuth;

public class SortFragment extends Fragment {

    private SortViewModel mViewModel;
    private RadioButton datetime_radio, location_radio;
    private RadioGroup filterGroup;
    private ImageView icon;
    private Button proceed;
    private FirebaseAuth mAuth;
    private SharedPreferences sharedPreferences;
    private UserDatabase userDatabase;

    public static SortFragment newInstance() {
        return new SortFragment();
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        View root = inflater.inflate(R.layout.sort_fragment, container, false);

        filterGroup = root.findViewById(R.id.filter_radio_group);

        datetime_radio = root.findViewById(R.id.datetime_radio);
        location_radio = root.findViewById(R.id.location_radio);

        mAuth = FirebaseAuth.getInstance();
        sharedPreferences = new SharedPreferences(requireContext());
        userDatabase = new UserDatabase(requireContext());

        icon = root.findViewById(R.id.icon);

        proceed = root.findViewById(R.id.proceed);

        proceed.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (NetworkCheck.networkCheck(requireContext())) {
                    if (validateInputs()) {

                    }
                }
            }
        });

        Glide.with(SortFragment.this).load(R.drawable.sort_photos).into(icon);

        datetime_radio.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {

            }
        });

        location_radio.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {

            }
        });

        return root;
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = new ViewModelProvider(this).get(SortViewModel.class);
        // TODO: Use the ViewModel
    }

    public boolean validateInputs() {
        int selectedFilterOption = filterGroup.getCheckedRadioButtonId();

        if (selectedFilterOption == -1) {
            Toast.makeText(requireActivity(), "Please select an option!!", Toast.LENGTH_LONG).show();
            return false;
        }

        else {
            RadioButton selectedFilter = filterGroup.findViewById(selectedFilterOption);

            if (selectedFilter.getText().toString().trim().equals("Date Time")) {
                User.getInstance().setFilterType("Date Time");
                uploadData();

                return true;
            }

            else if (selectedFilter.getText().toString().trim().equals("Location")) {
                User.getInstance().setFilterType("Location");
                uploadData();

                return true;
            }
        }

        return false;
    }

    public void uploadData() {
        User.getInstance().setUid(mAuth.getCurrentUser().getUid());
        userDatabase.uploadUserData();
        sharedPreferences.storeUserData(User.getInstance());
    }
}