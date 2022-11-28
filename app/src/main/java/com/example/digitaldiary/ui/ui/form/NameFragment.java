package com.example.digitaldiary.ui.ui.form;

import androidx.fragment.app.FragmentTransaction;
import androidx.lifecycle.ViewModelProvider;

import android.content.Context;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;

import com.bumptech.glide.Glide;
import com.example.digitaldiary.R;
import com.example.digitaldiary.models.User;
import com.google.android.material.textfield.TextInputEditText;

public class NameFragment extends Fragment {

    private NameViewModel mViewModel;
    private View root;
    private Context context;
    private Button proceed;
    private TextInputEditText first_name, last_name;

    public static NameFragment newInstance() {
        return new NameFragment();
    }

    private ImageView icon;

    public NameFragment(){}

    public NameFragment(Context context){
        this.context = context;
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        root = inflater.inflate(R.layout.name_fragment, container, false);

        icon = root.findViewById(R.id.icon);
        first_name = root.findViewById(R.id.first_name);
        last_name = root.findViewById(R.id.last_name);
        proceed = root.findViewById(R.id.proceed);

        proceed.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (validateInputs()){
                    BackupFragment backupFragment = new BackupFragment(root.getContext());

                    User.getInstance().setName(first_name.getText().toString().trim() + " " + last_name.getText().toString().trim());

                    FragmentTransaction transaction = getParentFragmentManager().beginTransaction();
                    transaction.replace(R.id.fragment_container, backupFragment);
                    transaction.addToBackStack(null);
                    transaction.commit();
                }
            }
        });

        Glide.with(this).load(R.drawable.avatar).into(icon);

        return root;
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = new ViewModelProvider(this).get(NameViewModel.class);
        // TODO: Use the ViewModel
    }

    private boolean validateInputs(){
        if (this.first_name.getText().toString().equals("")){
            this.first_name.setError("Please enter your first name!");
            return false;
        }

        else if (this.last_name.getText().toString().equals("")) {
            this.first_name.setError("Please enter your last name!");
            return false;
        }

        return true;
    }
}