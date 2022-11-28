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

public class OTPLogin extends AppCompatActivity {

    private ImageView icon;
    private TextView email;
    private Button login;
    private TextInputEditText phone;
    private FirebaseAccount firebaseAccount;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        icon = findViewById(R.id.icon);
        email = findViewById(R.id.email_textView);
        login = findViewById(R.id.login);
        phone = findViewById(R.id.phone_number);

        firebaseAccount = new FirebaseAccount(this);

        email.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(OTPLogin.this, SignUp.class);
                startActivity(intent);
                finish();
            }
        });

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (NetworkCheck.networkCheck(OTPLogin.this)){
                    if (validateInputs()){
                        //Toast.makeText(OTPLogin.this, "Login Complete!", Toast.LENGTH_SHORT).show();
                        firebaseAccount.createUserWithPhone("+91" + phone.getText().toString());

                        Intent intent = new Intent(OTPLogin.this, OTPVerification.class);
                        intent.putExtra("mobile_number", "+91" + phone.getText().toString());
                        startActivity(intent);
                        finish();
                    }
                }

                else{
                    Toast.makeText(OTPLogin.this, "No Internet Connection!", Toast.LENGTH_SHORT).show();
                }
            }
        });

        Glide.with(this).load(R.drawable.giphy).into(icon);
    }

    public boolean validateInputs(){
        if (phone.getText().toString().equals("")){
            phone.setError("Please enter a valid mobile number!");
            return false;
        }

        else if (phone.getText().toString().length() > 10 || phone.getText().toString().length() < 10) {
            phone.setError("Mobile number should be 10 digits!");
            return false;
        }

        return true;
    }
}