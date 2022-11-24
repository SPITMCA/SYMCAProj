import 'dart:io';

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:firebase_storage/firebase_storage.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';

class ProductProvider extends ChangeNotifier {
  String selectedCategory;
  String selectedSubCategory;
  String categoryImage;
  File image;
  String pickerError;
  String shopName;
  String productUrl;

  selectCategory(mainCategory, categoryImage) {
    this.selectedCategory = mainCategory;
    this.categoryImage = categoryImage;
    notifyListeners();
  }

  selectSubCategory(selected) {
    this.selectedSubCategory = selected;
    notifyListeners();
  }

  getShopName(shopName) {
    this.shopName = shopName;
    notifyListeners();
  }

  resetProvider() {
    this.selectedCategory = null;
    this.selectedSubCategory = null;
    this.categoryImage = null;
    this.image = null;
    this.productUrl = null;
    notifyListeners();
  }

  //upload product image
  Future<String> uploadProductImage(filePath, productName) async {
    File file = File(filePath);

    var timeStamp = Timestamp.now().millisecondsSinceEpoch;

    FirebaseStorage _storage = FirebaseStorage.instance;

    try {
      await _storage
          .ref('productImage/${this.shopName}/$productName$timeStamp')
          .putFile(file);
    } on FirebaseException catch (e) {
      // e.g, e.code == 'canceled'
      print(e.code);
    }
    String downloadURL = await _storage
        .ref('productImage/${this.shopName}/$productName$timeStamp')
        .getDownloadURL();
    this.productUrl = downloadURL;
    notifyListeners();
    return downloadURL;
  }

  Future<File> getProductImage() async {
    final picker = ImagePicker();
    final pickedFile =
        await picker.getImage(source: ImageSource.gallery, imageQuality: 20);
    if (pickedFile != null) {
      this.image = File(pickedFile.path);
      notifyListeners();
    } else {
      this.pickerError = 'No image selected.';
      print('No image selected.');
      notifyListeners();
    }
    return this.image;
  }

  alertDialog({context, title, content}) {
    return showCupertinoDialog(
        context: context,
        builder: (BuildContext context) {
          return CupertinoAlertDialog(
            title: Text(title),
            content: Text(content),
            actions: [
              CupertinoDialogAction(
                child: Text('OK'),
                onPressed: () {
                  Navigator.pop(context);
                },
              ),
            ],
          );
        });
  }

  //save product data to fireStore

  Future<void> saveProductDataToDb(
      //need to bring this details from add to product Screen
      {
    productName,
    description,
    price,
    comparedPrice,
    collection,
    sku,
    tax,
    stockQty,
    lowStockQty,
    context,
    brand,
  }) {
    var timeStamp = DateTime.now().millisecondsSinceEpoch;
    User user = FirebaseAuth.instance.currentUser;
    CollectionReference _products =
        FirebaseFirestore.instance.collection('products');
    try {
      _products.doc(timeStamp.toString()).set({
        'seller': {'shopName': this.shopName, 'sellerUid': user.uid},
        'productName': productName,
        'description': description,
        'price': price,
        'comparedPrice': comparedPrice,
        'collection': collection,
        'sku': sku,
        'brand': brand,
        'categoryName': {
          'mainCategory': this.selectedCategory,
          'subCategory': this.selectedSubCategory,
          'categoryImage': this.categoryImage,
        },
        'tax': tax,
        'stockQty': stockQty,
        'lowStockQty': lowStockQty,
        'published': false, //keep initial value as false
        'productId': timeStamp.toString(),
        'productImage': this.productUrl,
      });
      this.alertDialog(
        context: context,
        title: 'Save Data',
        content: 'Products details saved successfully',
      );
    } catch (e) {
      this.alertDialog(
        context: context,
        title: 'Save Data',
        content: '${e.toString()}',
      );
    }
    return null;
  }

  Future<void> updateProduct(
      //need to bring this details from add to product Screen
      {
    productName,
    description,
    price,
    comparedPrice,
    collection,
    sku,
    tax,
    stockQty,
    lowStockQty,
    context,
    brand,
    productId,
    image,
    category,
    subCategory,
    categoryImage,
  }) {
    User user = FirebaseAuth.instance.currentUser;
    CollectionReference _products =
        FirebaseFirestore.instance.collection('products');
    try {
      _products.doc(productId).update({
        'productName': productName,
        'description': description,
        'price': price,
        'comparedPrice': comparedPrice,
        'collection': collection,
        'sku': sku,
        'brand': brand,
        'categoryName': {
          'mainCategory': category,
          'subCategory': subCategory,
          'categoryImage':
              this.categoryImage == null ? categoryImage : this.categoryImage,
        },
        'tax': tax,
        'stockQty': stockQty,
        'lowStockQty': lowStockQty,
        'productImage': this.productUrl == null ? image : this.productUrl,
      });
      this.alertDialog(
        context: context,
        title: 'Save Data',
        content: 'Products details saved successfully',
      );
    } catch (e) {
      this.alertDialog(
        context: context,
        title: 'Save Data',
        content: '${e.toString()}',
      );
    }
    return null;
  }
}
