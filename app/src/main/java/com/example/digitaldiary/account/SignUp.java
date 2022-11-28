package com.example.digitaldiary.account;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.digitaldiary.R;
import com.example.digitaldiary.common.NetworkCheck;
import com.example.digitaldiary.repository.FirebaseAccount;
import com.google.android.material.textfield.TextInputEditText;

import java.util.regex.Pattern;

public class SignUp extends AppCompatActivity {

    private ImageView icon;
    private TextView login;
    private Button signUp;
    private TextInputEditText email, password, confirm_password;
    private FirebaseAccount firebaseAccount;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        icon = findViewById(R.id.icon);
        signUp = findViewById(R.id.sign_up);
        email = findViewById(R.id.email);
        password = findViewById(R.id.password);
        confirm_password = findViewById(R.id.confirm_password);
        login = findViewById(R.id.login_textView);

        firebaseAccount = new FirebaseAccount(this);

        Glide.with(this).load(R.drawable.giphy).into(icon);

        signUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (NetworkCheck.networkCheck(SignUp.this)){
                    if (validateInputs()){
                        //Toast.makeText(SignUp.this, "Sign Up Complete!", Toast.LENGTH_SHORT).show();
                        firebaseAccount.createUserWithEmail(email.getText().toString(), password.getText().toString());
                    }
                }

                else{
                    Toast.makeText(SignUp.this, "No Internet Connection!", Toast.LENGTH_SHORT).show();
                }
            }
        });

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(SignUp.this, Login.class);
                startActivity(intent);
                finish();
            }
        });
    }

    private boolean validateEmail(String email){
        String emailRegex = "^[a-zA-Z0-9_+&*-]+(?:\\."+
                "[a-zA-Z0-9_+&*-]+)*@" +
                "(?:[a-zA-Z0-9-]+\\.)+[a-z" +
                "A-Z]{2,7}$";

        Pattern pat = Pattern.compile(emailRegex);

        if (email == null)
            return false;

        return pat.matcher(email).matches();
    }

    public boolean validateInputs(){
        if (email.getText().toString().equals("")){
            email.setError("Please specify your email!!");
            return false;
        }
        if (password.getText().toString().equals("")){
            password.setError("Please specify a password!!");
            return false;
        }
        if (confirm_password.getText().toString().equals("")){
            confirm_password.setError("Please confirm your password!!");
            return false;
        }
        if (!password.getText().toString().equals(confirm_password.getText().toString())){
            confirm_password.setError("Passwords do not match!!");
            return false;
        }
        if (!validateEmail(email.getText().toString())){
            email.setError("Please enter a valid email!!");
            return false;
        }

        return true;
    }
}