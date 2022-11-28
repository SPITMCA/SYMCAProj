package com.example.digitaldiary.document_vault;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.digitaldiary.R;
import com.example.digitaldiary.common.NetworkCheck;
import com.example.digitaldiary.common.SharedPreferences;
import com.example.digitaldiary.models.User;
import com.example.digitaldiary.repository.UserDatabase;
import com.google.firebase.auth.FirebaseAuth;

public class CreateDocumentVaultActivity extends AppCompatActivity {

    private EditText name;
    private EditText password;
    private EditText confirm_password;
    private Button createVault;
    private SharedPreferences sharedPreferences;
    private FirebaseAuth mAuth;
    private UserDatabase userDatabase;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_document_vault);

        name = findViewById(R.id.name);
        password = findViewById(R.id.password);
        confirm_password = findViewById(R.id.confirm_password);
        createVault = findViewById(R.id.create_vault_button);

        sharedPreferences = new SharedPreferences(this);

        mAuth = FirebaseAuth.getInstance();

        userDatabase = new UserDatabase(this);

        createVault.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (NetworkCheck.networkCheck(CreateDocumentVaultActivity.this)){
                    if (validateInputs()){
                        User user = sharedPreferences.getUserData(mAuth.getCurrentUser().getUid());

                        user.setDocumentVaultCreated(true);
                        user.getDocumentVault().setName(name.getText().toString());
                        user.getDocumentVault().setPassword(password.getText().toString());

                        sharedPreferences.storeUserData(user);
                        userDatabase.updateUserData(user);

                        Toast.makeText(CreateDocumentVaultActivity.this, "Document Vault Created!", Toast.LENGTH_SHORT).show();

                        Intent intent = new Intent(CreateDocumentVaultActivity.this, DocumentVaultActivity.class);
                        startActivity(intent);
                        finish();
                    }
                }

                else{
                    Toast.makeText(CreateDocumentVaultActivity.this, "Please check your internet connection!", Toast.LENGTH_LONG).show();
                }
            }
        });

        if (getIntent().getBooleanExtra("forgot_password", false)){
            name.setText(sharedPreferences.getUserData(mAuth.getCurrentUser().getUid()).getDocumentVault().getName());
        }
    }

    private boolean validateInputs(){
        if (name.getText().toString().equals("")){
            name.setError("Please enter a vault name!");
            return false;
        }

        if (password.getText().toString().equals("")){
            name.setError("Please enter a vault password!");
            return false;
        }

        if (confirm_password.getText().toString().equals("")){
            name.setError("Please confirm vault password!");
            return false;
        }

        if (!password.getText().toString().equals(confirm_password.getText().toString())){
            Toast.makeText(this, "Passwords do not match!", Toast.LENGTH_SHORT).show();
            return false;
        }

         if (password.getText().toString().length() < 6){
             password.setError("Password must be at least 6 characters long!");
             return false;
         }

        return true;
    }
}