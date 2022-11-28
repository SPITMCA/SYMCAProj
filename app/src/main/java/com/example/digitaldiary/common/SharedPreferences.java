package com.example.digitaldiary.common;

import android.content.Context;
import android.util.Log;

import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.models.User;
import com.google.gson.Gson;

import java.util.ArrayList;
import java.util.HashSet;
import java.util.Iterator;
import java.util.Map;
import java.util.Set;

public class SharedPreferences {

    private android.content.SharedPreferences sharedPreferences;
    private android.content.SharedPreferences.Editor editor;
    private Context context;

    public SharedPreferences(Context context){
        this.context = context;
        this.sharedPreferences = context.getSharedPreferences("userPreferences", Context.MODE_PRIVATE);
    }

    public User getUserData(String uid){
        Gson gson = new Gson();

        String userJson = sharedPreferences.getString(uid, "");
        User user = gson.fromJson(userJson, User.class);

        //Log.d("ShowsSharedPreferences", "User ID: " + user.getUid());

        if (user != null){
            return user;
        }

        else{
            return null;
        }
    }

    public void storeUserData(User user){
        this.editor = context.getSharedPreferences("userPreferences", Context.MODE_PRIVATE).edit();

        Gson gson = new Gson();
        String userJson = gson.toJson(user);

        editor.putString(user.getUid(), userJson);
        Log.d("SharedPreferences", "User ID: " + user.getUid());
        editor.apply();
    }

    public void storeImageLabels(Map<String, ArrayList<ImageDataModel>> images){
        this.editor = context.getSharedPreferences("userPreferences", Context.MODE_PRIVATE).edit();

        Set<String> temp = new HashSet<>();

        for (Map.Entry<String, ArrayList<ImageDataModel>> entry : images.entrySet()){
            temp.add(entry.getKey());
        }

        editor.putStringSet("imageLabels", temp);

        editor.apply();
    }

    public ArrayList<String> getImageLabels(){
        Set<String> temp = new HashSet<>();
        ArrayList<String> labels = new ArrayList<>();

        this.editor = context.getSharedPreferences("userPreferences", Context.MODE_PRIVATE).edit();

        temp = sharedPreferences.getStringSet("imageLabels", null);

        Iterator iterator = temp.iterator();

        while (iterator.hasNext()){
            labels.add(iterator.next().toString());
        }

        return labels;
    }
}
