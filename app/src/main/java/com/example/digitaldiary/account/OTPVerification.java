package com.example.digitaldiary.account;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.digitaldiary.R;
import com.example.digitaldiary.repository.FirebaseAccount;
import com.google.android.material.textfield.TextInputEditText;

public class OTPVerification extends AppCompatActivity {

    private TextInputEditText code;
    private TextView resend_code;
    private Button verify;
    private FirebaseAccount firebaseAccount;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_otpverification);

        code = findViewById(R.id.code);
        verify = findViewById(R.id.verify);
        resend_code = findViewById(R.id.resend_otp);
        firebaseAccount = new FirebaseAccount(this);

        verify.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (code.getText().toString().equals("")){
                    Toast.makeText(OTPVerification.this, "Please enter your OTP!!", Toast.LENGTH_LONG).show();
                }

                else{
                    firebaseAccount.verifyPhoneNumberWithCode(firebaseAccount.mVerificationId, code.getText().toString());
                }
            }
        });

        resend_code.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String phone = getIntent().getStringExtra("mobile_number");
                firebaseAccount.resendVerificationCode(phone, firebaseAccount.mResendToken);
            }
        });
    }
}