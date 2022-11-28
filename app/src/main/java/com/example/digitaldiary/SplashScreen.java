package com.example.digitaldiary;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.util.Log;

import com.example.digitaldiary.account.Login;
import com.example.digitaldiary.account.NewUserForm;
import com.example.digitaldiary.account.OTPLogin;
import com.example.digitaldiary.account.SignUp;
import com.example.digitaldiary.common.NetworkCheck;
import com.example.digitaldiary.common.SharedPreferences;
import com.example.digitaldiary.models.User;
import com.example.digitaldiary.repository.SQLiteDB;
import com.example.digitaldiary.repository.UserDatabase;
import com.example.digitaldiary.ui.Home;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

public class SplashScreen extends AppCompatActivity {

    private int splashTime = 1000;
    private FirebaseAuth mAuth;
    private DatabaseReference firebaseDatabase;
    private SharedPreferences sharedPreferences;
    private UserDatabase userDatabase;
    private SQLiteDB sqLiteDB;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash_screen);

        getSupportActionBar().hide();

        mAuth = FirebaseAuth.getInstance();
        firebaseDatabase = FirebaseDatabase.getInstance().getReference();
        sharedPreferences = new SharedPreferences(this);
        userDatabase = new UserDatabase(this);
        sqLiteDB = SQLiteDB.getInstance(this);

        new Handler(Looper.getMainLooper()).postDelayed(new Runnable() {
            @Override
            public void run() {
                if (NetworkCheck.networkCheck(SplashScreen.this)) {
                    if (mAuth.getCurrentUser() != null) {
                        User.getInstance().setUid(mAuth.getCurrentUser().getUid());

                        Log.d("Splash Activity", "User ID: " + User.getInstance().getUid());

                        DatabaseReference uidReference = firebaseDatabase.child("users").child(User.getInstance().getUid());

                        ValueEventListener eventListener = new ValueEventListener() {
                            @Override
                            public void onDataChange(@NonNull DataSnapshot snapshot) {
                                if (!snapshot.exists()) {
                                    Intent i = new Intent(SplashScreen.this, NewUserForm.class);
                                    startActivity(i);
                                    finish();
                                }
                                else {
                                    if (sharedPreferences.getUserData(mAuth.getCurrentUser().getUid()) == null){
                                        userDatabase.downloadUserDataToSharedPreferences();
                                    }

                                    if (sqLiteDB.ImageDao().getAll().size() == 0){
                                        userDatabase.downloadImageDataToSQLite();
                                    }

                                    Intent i = new Intent(SplashScreen.this, Home.class);
                                    startActivity(i);
                                    finish();
                                }
                            }

                            @Override
                            public void onCancelled(@NonNull DatabaseError error) {

                            }
                        };

                        uidReference.addListenerForSingleValueEvent(eventListener);

                        /*Intent i = new Intent(SplashScreen.this, Home.class);
                        startActivity(i);
                        finish();*/
                    }

                    else {
                        Intent i = new Intent(SplashScreen.this, Login.class);
                        startActivity(i);
                        finish();
                    }
                }

                else{

                }
            }
        }, splashTime);
    }
}