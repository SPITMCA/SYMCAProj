package com.example.digitaldiary.account;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.digitaldiary.R;
import com.example.digitaldiary.common.NetworkCheck;
import com.example.digitaldiary.repository.FirebaseAccount;
import com.google.android.gms.auth.api.signin.GoogleSignIn;
import com.google.android.gms.auth.api.signin.GoogleSignInAccount;
import com.google.android.gms.auth.api.signin.GoogleSignInClient;
import com.google.android.gms.auth.api.signin.GoogleSignInOptions;
import com.google.android.gms.common.api.ApiException;
import com.google.android.gms.tasks.Task;
import com.google.android.material.textfield.TextInputEditText;
import com.shobhitpuri.custombuttons.GoogleSignInButton;

import java.util.regex.Pattern;

public class Login extends AppCompatActivity {

    private TextView sign_up;
    private Button login;
    private TextInputEditText email, password;
    private GoogleSignInButton googleButton;
    private FirebaseAccount firebaseAccount;
    private GoogleSignInOptions gso;
    private GoogleSignInClient mSignInClient;
    private ImageView icon;
    private static final int RC_SIGN_IN = 100;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login2);

        sign_up = findViewById(R.id.signup_textView);
        email = findViewById(R.id.email);
        password = findViewById(R.id.password);
        googleButton = findViewById(R.id.google_button);
        firebaseAccount = new FirebaseAccount(Login.this);
        icon = findViewById(R.id.icon);

        Glide.with(this).load(R.drawable.giphy).into(icon);

        sign_up.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Login.this, SignUp.class);
                startActivity(intent);
                finish();
            }
        });

        login = findViewById(R.id.login);
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (NetworkCheck.networkCheck(Login.this)) {
                    if (validateInputs()){
                        firebaseAccount.signInWithEmail(email.getText().toString(), password.getText().toString());
                    }
                }

                else{
                    Toast.makeText(Login.this, "Please check your internet connection!", Toast.LENGTH_LONG).show();
                }
            }
        });

        gso = new GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN)
                .requestIdToken("971770686336-rdhplo39649tqn2blpep73g6eio5jgs6.apps.googleusercontent.com")
                .requestEmail()
                .build();

        mSignInClient = GoogleSignIn.getClient(this, gso);

        googleButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent signInIntent = mSignInClient.getSignInIntent();
                startActivityForResult(signInIntent, RC_SIGN_IN);
            }
        });
    }

    //google sign-in & facebook sign-in
    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        // Result returned from launching the Intent from GoogleSignInApi.getSignInIntent(...);
        if (requestCode == RC_SIGN_IN) {
            Task<GoogleSignInAccount> task = GoogleSignIn.getSignedInAccountFromIntent(data);
            try {
                // Google Sign In was successful, authenticate with Firebase
                GoogleSignInAccount account = task.getResult(ApiException.class);
                Log.d("Login", "firebaseAuthWithGoogle:" + account.getId());
                firebaseAccount.firebaseAuthWithGoogle(account.getIdToken());

            } catch (ApiException e) {
                // Google Sign In failed, update UI appropriately
                Log.w("Login", "Google sign in failed", e);
            }
        }
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

        if (!validateEmail(email.getText().toString())){
            email.setError("Please enter a valid email!!");
            return false;
        }

        return true;
    }
}