package com.example.digitaldiary.models;

import org.w3c.dom.Document;

public class User {
    private String name;
    private boolean takeBackup;
    private String imageQuality;
    private String uid;
    private String filterType;
    private int numberOfImagesLabeled;
    private boolean documentVaultCreated;
    private DocumentVault documentVault;

    //singleton instance
    private static User user = null;

    public User() {
        this.name = "";
        this.takeBackup = false;
        this.imageQuality = "";
        this.numberOfImagesLabeled = 0;
        this.documentVaultCreated = false;
        this.documentVault = new DocumentVault();
    }

    public User(String name, boolean takeBackup, String imageQuality, String filterType) {
        this.name = name;
        this.takeBackup = takeBackup;
        this.imageQuality = imageQuality;
        this.filterType = filterType;
        this.numberOfImagesLabeled = 0;
        this.documentVaultCreated = false;
        this.documentVault = new DocumentVault();
    }

    public static synchronized User getInstance(){
        if (user == null){
            user = new User();
        }

        return user;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public boolean isTakeBackup() {
        return takeBackup;
    }

    public void setTakeBackup(boolean takeBackup) {
        this.takeBackup = takeBackup;
    }

    public String getImageQuality() {
        return imageQuality;
    }

    public void setImageQuality(String imageQuality) {
        this.imageQuality = imageQuality;
    }

    public static User getUser() {
        return user;
    }

    public static void setUser(User user) {
        User.user = user;
    }

    public String getUid() {
        return uid;
    }

    public void setUid(String uid) {
        this.uid = uid;
    }

    public String getFilterType() {
        return filterType;
    }

    public void setFilterType(String filterType) {
        this.filterType = filterType;
    }

    public int getNumberOfImagesLabeled() {
        return numberOfImagesLabeled;
    }

    public void setNumberOfImagesLabeled(int numberOfImagesLabeled) {
        this.numberOfImagesLabeled = numberOfImagesLabeled;
    }

    public boolean isDocumentVaultCreated() {
        return documentVaultCreated;
    }

    public void setDocumentVaultCreated(boolean documentVaultCreated) {
        this.documentVaultCreated = documentVaultCreated;
    }

    public DocumentVault getDocumentVault() {
        return documentVault;
    }

    public void setDocumentVault(DocumentVault documentVault) {
        this.documentVault = documentVault;
    }
}
