import 'dart:io';

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_storage/firebase_storage.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:image_picker/image_picker.dart';
import 'package:provider/provider.dart';
import 'package:shukran_vendor/providers/product_provider.dart';
import 'package:shukran_vendor/services/firebase_services.dart';
import 'package:shukran_vendor/widgets/banner_card.dart';

class BannerScreen extends StatefulWidget {
  static const String id = 'banner_screen';

  @override
  _BannerScreenState createState() => _BannerScreenState();
}

class _BannerScreenState extends State<BannerScreen> {
  bool _visible = false;
  File _image;
  var _imagePathText = TextEditingController();
  FireBaseServices _services = FireBaseServices();

  @override
  Widget build(BuildContext context) {
    var _provider = Provider.of<ProductProvider>(context);

    return Scaffold(
        body: ListView(
      padding: EdgeInsets.zero,
      children: [
        BannerCard(),
        Divider(thickness: 3),
        Container(
          child: Center(
            child: Text(
              'Add New Banner',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
          ),
        ),
        Container(
          child: Padding(
            padding: const EdgeInsets.all(10.0),
            child: Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                SizedBox(
                  height: 150,
                  width: MediaQuery.of(context).size.width,
                  child: Card(
                    elevation: 5,
                    color: Colors.grey.shade200,
                    child: _image != null
                        ? Image.file(
                            _image,
                            fit: BoxFit.fill,
                          )
                        : Center(
                            child: Text('No Image Selected'),
                          ),
                  ),
                ),
                SizedBox(height: 20),
                TextFormField(
                  controller: _imagePathText,
                  enabled: false,
                  decoration: InputDecoration(
                      contentPadding: EdgeInsets.zero,
                      border: OutlineInputBorder()),
                ),
                SizedBox(height: 20),
                Visibility(
                  visible: _visible ? false : true,
                  child: Row(
                    children: [
                      Expanded(
                        child: FlatButton(
                          color: Colors.blueAccent,
                          onPressed: () {
                            setState(() {
                              _visible = true;
                            });
                          },
                          child: Text(
                            'Add a new Banner',
                            style: TextStyle(color: Colors.white),
                          ),
                        ),
                      ),
                    ],
                  ),
                ),
                Visibility(
                  visible: _visible,
                  child: Container(
                    child: Column(
                      children: [
                        Row(
                          children: [
                            Expanded(
                              child: FlatButton(
                                color: Colors.blueAccent,
                                onPressed: () {
                                  getBannerImage().then((value) {
                                    if (_image != null) {
                                      setState(() {
                                        _imagePathText.text = _image.path;
                                      });
                                    }
                                  });
                                },
                                child: Text(
                                  'Upload Image',
                                  style: TextStyle(color: Colors.white),
                                ),
                              ),
                            ),
                          ],
                        ),
                        Row(
                          children: [
                            Expanded(
                              child: AbsorbPointer(
                                absorbing: _image != null ? false : true,
                                child: FlatButton(
                                  color: _image != null
                                      ? Colors.blueAccent
                                      : Colors.grey,
                                  onPressed: () {
                                    EasyLoading.show(status: 'Saving...');
                                    uploadBannerImage(
                                            _image.path, _provider.shopName)
                                        .then((url) {
                                      if (url != null) {
                                        _services.saveBanner(url);
                                        setState(() {
                                          _imagePathText.clear();
                                          _image = null;
                                        });
                                        EasyLoading.dismiss();
                                        _provider.alertDialog(
                                            context: context,
                                            title: 'Banner Upload',
                                            content:
                                                'Banner Image uploaded Successfully ');
                                      } else {
                                        _provider.alertDialog(
                                            context: context,
                                            title: 'Banner Upload',
                                            content: 'Banner Upload Failed');
                                      }
                                    });
                                  },
                                  child: Text(
                                    'Save',
                                    style: TextStyle(color: Colors.white),
                                  ),
                                ),
                              ),
                            ),
                          ],
                        ),
                        Row(
                          children: [
                            Expanded(
                              child: FlatButton(
                                color: Colors.black54,
                                onPressed: () {
                                  setState(() {
                                    _visible = false;
                                  });
                                  _imagePathText.clear();
                                  _image = null;
                                },
                                child: Text(
                                  'Cancel',
                                  style: TextStyle(color: Colors.white),
                                ),
                              ),
                            ),
                          ],
                        ),
                      ],
                    ),
                  ),
                ),
              ],
            ),
          ),
        )
      ],
    ));
  }

  Future<File> getBannerImage() async {
    final picker = ImagePicker();
    final pickedFile =
        await picker.getImage(source: ImageSource.gallery, imageQuality: 20);
    if (pickedFile != null) {
      setState(() {
        _image = File(pickedFile.path);
      });
    } else {
      print('No image selected.');
    }
    return _image;
  }

  Future<String> uploadBannerImage(filePath, shopName) async {
    File file = File(filePath);

    var timeStamp = Timestamp.now().millisecondsSinceEpoch;

    FirebaseStorage _storage = FirebaseStorage.instance;

    try {
      await _storage.ref('vendorBanner/$shopName/$timeStamp').putFile(file);
    } on FirebaseException catch (e) {
      // e.g, e.code == 'canceled'
      print(e.code);
    }
    String downloadURL = await _storage
        .ref('vendorBanner/$shopName/$timeStamp')
        .getDownloadURL();
    return downloadURL;
  }
}
