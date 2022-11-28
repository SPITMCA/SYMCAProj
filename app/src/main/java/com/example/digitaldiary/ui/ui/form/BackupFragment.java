package com.example.digitaldiary.ui.ui.form;

import androidx.cardview.widget.CardView;
import androidx.core.content.ContextCompat;
import androidx.fragment.app.FragmentTransaction;
import androidx.lifecycle.ViewModelProvider;

import android.content.Context;
import android.media.Image;
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
import android.widget.LinearLayout;
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

public class BackupFragment extends Fragment {

    private BackupViewModel mViewModel;
    private View root;
    private ImageView icon;
    private Context context;
    private CardView original_cardView, compressed_cardView;
    private RadioButton original_radio, compressed_radio, yes_radio, no_radio;
    private Button proceed;
    private RadioGroup backupGroup, qualityGroup;
    private LinearLayout qualityLayout;
    private UserDatabase userDatabase;
    private FirebaseAuth mAuth;
    private SharedPreferences sharedPreferences;

    public static BackupFragment newInstance() {
        return new BackupFragment();
    }

    public BackupFragment(){}

    public BackupFragment(Context context){
        this.context = context;
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        this.root = inflater.inflate(R.layout.backup_fragment, container, false);

        icon = root.findViewById(R.id.icon);
        original_cardView = root.findViewById(R.id.original_cardView);
        compressed_cardView = root.findViewById(R.id.compressed_cardView);
        original_radio = root.findViewById(R.id.radio_original);
        compressed_radio = root.findViewById(R.id.radio_compressed);
        yes_radio = root.findViewById(R.id.yes_radio);
        no_radio = root.findViewById(R.id.no_radio);
        proceed = root.findViewById(R.id.proceed);
        backupGroup = root.findViewById(R.id.backup_radio_group);
        qualityGroup = root.findViewById(R.id.quality_radioGroup);
        qualityLayout = root.findViewById(R.id.quality_linearLayout);

        userDatabase = new UserDatabase(context);

        mAuth = FirebaseAuth.getInstance();

        sharedPreferences = new SharedPreferences(context);

        original_cardView.setBackgroundResource(R.drawable.cardview_genre_unselected);
        original_cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                original_radio.setChecked(true);
                compressed_radio.setChecked(false);
                original_cardView.setBackgroundResource(R.drawable.cardview_genre_selected);
                compressed_cardView.setBackgroundResource(R.drawable.cardview_genre_unselected);
            }
        });

        compressed_cardView.setBackgroundResource(R.drawable.cardview_genre_unselected);
        compressed_cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                original_radio.setChecked(false);
                compressed_radio.setChecked(true);
                compressed_cardView.setBackgroundResource(R.drawable.cardview_genre_selected);
                original_cardView.setBackgroundResource(R.drawable.cardview_genre_unselected);
            }
        });

        Glide.with(this).load(R.drawable.backup_animation).into(icon);

        proceed.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (NetworkCheck.networkCheck(context)){
                    if (validateInputs()){
                        //Toast.makeText(context, "Options Verified!!", Toast.LENGTH_LONG).show();
                        /*SortFragment sortFragment = new SortFragment();

                        FragmentTransaction transaction = getParentFragmentManager().beginTransaction();
                        transaction.replace(R.id.fragment_container, sortFragment);
                        transaction.addToBackStack(null);
                        transaction.commit();*/
                    }
                }
            }
        });

        yes_radio.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                if (b == true){
                    qualityLayout.setVisibility(View.VISIBLE);
                }
            }
        });

        no_radio.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                if (b == true){
                    qualityLayout.setVisibility(View.INVISIBLE);
                }
            }
        });

        return root;
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = new ViewModelProvider(this).get(BackupViewModel.class);
        // TODO: Use the ViewModel
    }

    public boolean validateInputs(){
        int selectedBackupOption = backupGroup.getCheckedRadioButtonId();

        if (selectedBackupOption == -1){
            Toast.makeText(context, "Please select an option!!", Toast.LENGTH_LONG).show();
            return false;
        }

        else {
            RadioButton selectedBackup = backupGroup.findViewById(selectedBackupOption);

            if (selectedBackup.getText().toString().trim().equals("Yes")){
                if (original_cardView.getBackground().getConstantState().equals(ContextCompat.getDrawable(context, R.drawable.cardview_genre_unselected).getConstantState())
                        && compressed_cardView.getBackground().getConstantState().equals(ContextCompat.getDrawable(context, R.drawable.cardview_genre_unselected).getConstantState())){
                    Toast.makeText(context, "Please select backup quality!!", Toast.LENGTH_LONG).show();
                    return false;
                }

                else {
                    if (original_cardView.getBackground().getConstantState().equals(ContextCompat.getDrawable(context, R.drawable.cardview_genre_selected).getConstantState())) {
                        //Toast.makeText(context, "Original", Toast.LENGTH_LONG).show();

                        User.getInstance().setTakeBackup(true);
                        User.getInstance().setImageQuality("original");
                        User.getInstance().setFilterType("");
                        uploadData();

                        return true;
                    }

                    else {
                        //Toast.makeText(context, "Compressed", Toast.LENGTH_LONG).show();

                        User.getInstance().setTakeBackup(true);
                        User.getInstance().setImageQuality("compressed");
                        User.getInstance().setFilterType("");
                        uploadData();

                        return true;
                    }
                }
            }

            else {
                User.getInstance().setTakeBackup(false);
                User.getInstance().setImageQuality("");
                uploadData();

                return true;
            }
        }
    }

    public void uploadData() {
        User.getInstance().setUid(mAuth.getCurrentUser().getUid());
        userDatabase.uploadUserData();
        sharedPreferences.storeUserData(User.getInstance());
    }
}