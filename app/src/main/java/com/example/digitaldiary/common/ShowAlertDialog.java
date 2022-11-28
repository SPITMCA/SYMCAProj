package com.example.digitaldiary.common;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.widget.Toast;

import androidx.core.app.ActivityCompat;
import androidx.fragment.app.FragmentTransaction;

import com.example.digitaldiary.R;
import com.example.digitaldiary.account.NewUserForm;
import com.example.digitaldiary.ui.ui.profile.ProfileFragment;

public class ShowAlertDialog {
    private static AlertDialog.Builder alertBuilder;
    private static SharedPreferences sharedPreferences;

    public static void showAlertDialog(Context context, String message, String message2){
        alertBuilder = new AlertDialog.Builder(context);
        //Uncomment the below code to Set the message and title from the strings.xml file
        alertBuilder.setMessage(message).setTitle(R.string.require_permission_dialog_title);

        //Setting message manually and performing action on button click
        alertBuilder.setMessage(message)
                .setTitle(R.string.require_permission_dialog_title)
                .setCancelable(false)
                .setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        /*requireActivity().finish();
                        Toast.makeText(requireActivity(),"you choose yes action for alertbox",
                                Toast.LENGTH_SHORT).show();*/
                        //checkAndRequestPermissions(requireActivity());
                    }
                })
                .setNegativeButton("No", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        //  Action for 'NO' Button
                        //dialog.cancel();
                        Toast.makeText(context, message2,
                                Toast.LENGTH_LONG).show();
                    }
                });
        //Creating dialog box
        AlertDialog alert = alertBuilder.create();
        //Setting the title manually
        //alert.setTitle("AlertDialogExample");
        alert.show();
    }
}
