package com.example.digitaldiary.ui.ui.profile;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.fragment.app.DialogFragment;
import androidx.lifecycle.ViewModelProvider;
import androidx.transition.AutoTransition;
import androidx.transition.TransitionManager;

import com.example.digitaldiary.R;
import com.example.digitaldiary.common.NetworkCheck;
import com.example.digitaldiary.common.SharedPreferences;
import com.example.digitaldiary.databinding.FragmentProfileBinding;
import com.example.digitaldiary.document_vault.CreateDocumentVaultActivity;
import com.example.digitaldiary.document_vault.DocumentVaultActivity;
import com.example.digitaldiary.models.User;
import com.example.digitaldiary.repository.UserDatabase;
import com.google.firebase.auth.FirebaseAuth;

import java.util.ArrayList;

public class ProfileFragment extends DialogFragment {

    private ProfileViewModel profileViewModel;
    private FragmentProfileBinding binding;

    private View root;

    private TextView welcome_textView;
    private TextView images_labeled;
    private TextView vaultTextView;

    private EditText name;
    private Spinner backup, image_quality;

    private SharedPreferences sharedPreferences;

    private ArrayList<String> backup_options;
    private ArrayList<String> image_quality_options;

    private User user;
    private FirebaseAuth mAuth;

    private Button update, createDocumentVault;
    private Button accessDocumentVault;

    private CardView documentVaultCardView;
    private LinearLayout createVaultLinearLayout;

    private AlertDialog.Builder alertBuilder;

    private LayoutInflater layoutInflater;
    private View passwordView;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        profileViewModel =
                new ViewModelProvider(this).get(ProfileViewModel.class);

        binding = FragmentProfileBinding.inflate(inflater, container, false);
        root = binding.getRoot();

        /*final TextView textView = binding.textNotifications;
        profileViewModel.getText().observe(getViewLifecycleOwner(), new Observer<String>() {
            @Override
            public void onChanged(@Nullable String s) {
                textView.setText(s);
            }
        });*/

        backup_options = new ArrayList<>();
        image_quality_options = new ArrayList<>();

        mAuth = FirebaseAuth.getInstance();

        sharedPreferences = new SharedPreferences(root.getContext());
        user = sharedPreferences.getUserData(mAuth.getCurrentUser().getUid());

        name = root.findViewById(R.id.name_editText);
        backup = root.findViewById(R.id.backup_spinner);
        image_quality = root.findViewById(R.id.image_quality_spinner);
        welcome_textView = root.findViewById(R.id.welcome_textView);
        update = root.findViewById(R.id.update_button);
        images_labeled = root.findViewById(R.id.images_labeled_textView);
        createDocumentVault = root.findViewById(R.id.document_vault_button);
        vaultTextView = root.findViewById(R.id.vault_textView);
        accessDocumentVault = root.findViewById(R.id.access_vault_button);

        welcome_textView.setText("Hey, " + user.getName());
        name.setText(user.getName());

        images_labeled.setText("" + user.getNumberOfImagesLabeled());

        documentVaultCardView = root.findViewById(R.id.document_vault_cardView);
        createVaultLinearLayout = root.findViewById(R.id.create_vault_linear_layout);

        layoutInflater = LayoutInflater.from(root.getContext());
        passwordView = layoutInflater.inflate(R.layout.vault_password_view, (ViewGroup) root.getRootView(), false);

        update.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (validateInputs()){
                    if (NetworkCheck.networkCheck(root.getContext())){
                        User user = sharedPreferences.getUserData(mAuth.getCurrentUser().getUid());

                        user.setName(name.getText().toString());

                        if (backup.getSelectedItem().toString().equals("Enabled")){
                            user.setTakeBackup(true);
                        }

                        else{
                            user.setTakeBackup(false);
                        }

                        user.setImageQuality(image_quality.getSelectedItem().toString());
                        user.setNumberOfImagesLabeled(Integer.parseInt(images_labeled.getText().toString()));

                        //uploading to firebase
                        UserDatabase userDatabase = new UserDatabase(root.getContext());
                        userDatabase.uploadUserData();

                        //updating in shared preferences
                        sharedPreferences.storeUserData(user);
                    }

                    else{
                        Toast.makeText(root.getContext(), "Please check your network connection!!", Toast.LENGTH_SHORT).show();
                    }
                }
            }
        });

        documentVaultCardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (createVaultLinearLayout.getVisibility() == View.VISIBLE){
                    TransitionManager.beginDelayedTransition(documentVaultCardView,
                            new AutoTransition());
                    createVaultLinearLayout.setVisibility(View.GONE);
                    vaultTextView.setCompoundDrawablesWithIntrinsicBounds(0, 0, R.drawable.profile_genres_expand, 0);
                }

                else {
                    TransitionManager.beginDelayedTransition(documentVaultCardView,
                            new AutoTransition());

                    createVaultLinearLayout.setVisibility(View.VISIBLE);
                    vaultTextView.setCompoundDrawablesWithIntrinsicBounds(0, 0, R.drawable.profile_genres_collapse, 0);
                }
            }
        });

        createDocumentVault.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(root.getContext(), CreateDocumentVaultActivity.class);
                root.getContext().startActivity(intent);
            }
        });

        accessDocumentVault.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                showAlertDialogForVault(root.getContext(), "Vault Password", "Your vault is locked! Please enter the password:");
            }
        });

        initializeSpinners();

        checkIfVaultCreated();

        return root;
    }

    private void checkIfVaultCreated() {
        if (sharedPreferences.getUserData(mAuth.getCurrentUser().getUid()).isDocumentVaultCreated()){
            documentVaultCardView.setVisibility(View.GONE);
            accessDocumentVault.setVisibility(View.VISIBLE);
        }
    }

    private void initializeSpinners() {
        backup_options.add("Enabled");
        backup_options.add("Disabled");

        ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(requireActivity(), android.R.layout.simple_spinner_item, backup_options);
        arrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        backup.setAdapter(arrayAdapter);

        image_quality_options.add("Compressed");
        image_quality_options.add("Original");
        image_quality_options.add("NA");

        ArrayAdapter<String> arrayAdapter1 = new ArrayAdapter<String>(requireActivity(), android.R.layout.simple_spinner_item, image_quality_options);
        arrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        image_quality.setAdapter(arrayAdapter1);

        if (user.isTakeBackup()){
            backup.setSelection(0);
        }

        else{
            backup.setSelection(1);
        }

        if (user.getImageQuality().equals("Compressed")){
            image_quality.setSelection(0);
        }

        else if (user.getImageQuality().equals("Original")){
            image_quality.setSelection(1);
        }

        else{
            image_quality.setSelection(2);
        }
    }

    public void showAlertDialogForVault(Context context, String message, String message2){
        alertBuilder = new AlertDialog.Builder(context);
        //Uncomment the below code to Set the message and title from the strings.xml file
        alertBuilder.setMessage(message).setTitle(message);

        alertBuilder.setView(passwordView);

        final EditText password_entered = passwordView.findViewById(R.id.vault_password);

        //Setting message manually and performing action on button click
        alertBuilder.setMessage(message2)
                .setTitle(R.string.require_permission_dialog_title)
                .setCancelable(false)
                .setPositiveButton("Access Vault", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        /*requireActivity().finish();
                        Toast.makeText(requireActivity(),"you choose yes action for alertbox",
                                Toast.LENGTH_SHORT).show();*/
                        //checkAndRequestPermissions(requireActivity());

                        if (sharedPreferences.getUserData(mAuth.getCurrentUser().getUid()).getDocumentVault().getPassword().equals(password_entered.getText().toString())){
                            Intent intent = new Intent(root.getContext(), DocumentVaultActivity.class);
                            root.getContext().startActivity(intent);
                            dialog.dismiss();
                            alertBuilder.setView(null);
                        }

                        else{
                            Toast.makeText(root.getContext(), "Password entered is invalid!", Toast.LENGTH_LONG).show();
                            dialog.dismiss();
                            alertBuilder.setView(null);
                        }
                    }
                })
                .setNegativeButton("Forgot Password?", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        //  Action for 'NO' Button
                        //dialog.cancel();
                        //Toast.makeText(context, message2,
                                //Toast.LENGTH_LONG).show();
                        Intent intent = new Intent(root.getContext(), CreateDocumentVaultActivity.class);
                        intent.putExtra("forgot_password", true);
                        root.getContext().startActivity(intent);
                        dialog.dismiss();
                        alertBuilder.setView(null);
                    }
                });
        //Creating dialog box
        AlertDialog alert = alertBuilder.create();
        //Setting the title manually
        //alert.setTitle("AlertDialogExample");
        alert.show();
    }

    @Override
    public void onDestroyView() {
        super.onDestroyView();
        binding = null;
    }

    public boolean validateInputs(){
        if (name.getText().toString().equals("")){
            name.setError("Please enter a valid name!");
            return false;
        }

        return true;
    }
}