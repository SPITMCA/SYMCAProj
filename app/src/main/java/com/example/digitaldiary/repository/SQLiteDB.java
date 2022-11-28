package com.example.digitaldiary.repository;

import android.content.Context;

import androidx.annotation.NonNull;
import androidx.room.Database;
import androidx.room.DatabaseConfiguration;
import androidx.room.InvalidationTracker;
import androidx.room.Room;
import androidx.room.RoomDatabase;
import androidx.sqlite.db.SupportSQLiteOpenHelper;

import com.example.digitaldiary.dao.ImageDao;
import com.example.digitaldiary.models.ImageDataModel;

//Add database entity
@Database(entities = {ImageDataModel.class}, version = 1, exportSchema = false)

public abstract class SQLiteDB extends RoomDatabase {
    //Create database instance
    private static SQLiteDB sqLiteDB;

    //Define database name
    private static final String DATABASE_NAME = "digital_diary";

    public synchronized static SQLiteDB getInstance(Context context){
        //Check condition
        if (sqLiteDB == null){
            //Initialize database
            sqLiteDB = Room.databaseBuilder(context.getApplicationContext(),
                    SQLiteDB.class,
                    DATABASE_NAME)
                    .allowMainThreadQueries()
                    .fallbackToDestructiveMigration()
                    .build();
        }

        return sqLiteDB;
    }

    public abstract ImageDao ImageDao();

    @NonNull
    @Override
    protected SupportSQLiteOpenHelper createOpenHelper(DatabaseConfiguration config) {
        return null;
    }

    @NonNull
    @Override
    protected InvalidationTracker createInvalidationTracker() {
        return null;
    }

    @Override
    public void clearAllTables() {

    }
}
