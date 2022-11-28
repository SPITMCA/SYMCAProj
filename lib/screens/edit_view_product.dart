import 'dart:io';

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:provider/provider.dart';
import 'package:shukran_vendor/providers/product_provider.dart';
import 'package:shukran_vendor/services/firebase_services.dart';
import 'package:shukran_vendor/widgets/category_list_widget.dart';

class EditViewProduct extends StatefulWidget {
  final String productId;

  EditViewProduct({this.productId});

  @override
  _EditViewProductState createState() => _EditViewProductState();
}

class _EditViewProductState extends State<EditViewProduct> {
  List<String> _collections = [
    'Featured Products',
    'Best Selling',
    'Recently Added',
  ];
  String dropDownValue;

  FireBaseServices _services = FireBaseServices();
  final _formKey = GlobalKey<FormState>();
  var _brandText = TextEditingController();
  var _skuText = TextEditingController();
  var _productNameText = TextEditingController();
  var _priceText = TextEditingController();
  var _comparedPriceText = TextEditingController();
  var _descriptionText = TextEditingController();
  var _categoryTextController = TextEditingController();
  var _subcategoryTextController = TextEditingController();
  var _stockTextController = TextEditingController();
  var _lowStockTextController = TextEditingController();
  var _taxTextController = TextEditingController();

  DocumentSnapshot doc;
  double discount;
  String image;
  String categoryImage;
  File _image;
  bool _visible = false;
  bool _editing = true;

  @override
  void initState() {
    getProductDetails();
    // TODO: implement initState
    super.initState();
  }

  Future<void> getProductDetails() async {
    _services.products
        .doc(widget.productId)
        .get()
        .then((DocumentSnapshot document) {
      if (document.exists) {
        setState(() {
          doc = document;
          _brandText.text = document['brand'];
          _skuText.text = document['sku'];
          _productNameText.text = document['productName'];
          _priceText.text = document['price'].toString();
          _comparedPriceText.text = document['comparedPrice'].toString();
          var difference = double.parse(_comparedPriceText.text) -
              double.parse(_priceText.text);
          discount = (difference / double.parse(_comparedPriceText.text) * 100);
          image = document['productImage'];
          _descriptionText.text = document['description'];
          _categoryTextController.text =
              document['categoryName']['mainCategory'];
          _subcategoryTextController.text =
              document['categoryName']['subCategory'];
          dropDownValue = document['collection'];
          _stockTextController.text = document['stockQty'].toString();
          _lowStockTextController.text = document['lowStockQty'].toString();
          _taxTextController.text = document['tax'].toString();
          categoryImage = document['categoryImage'];
        });
        // print(document.data());
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    var _provider = Provider.of<ProductProvider>(context);

    return Scaffold(
      appBar: AppBar(
        actions: [
          FlatButton(
              onPressed: () {
                setState(() {
                  _editing = false;
                });
              },
              child: Text(
                'Edit',
                style: TextStyle(color: Colors.white),
              ))
        ],
      ),
      bottomSheet: Container(
        height: 60,
        child: Row(
          children: [
            Expanded(
              child: InkWell(
                onTap: () {
                  Navigator.pop(context);
                },
                child: Container(
                  color: Colors.black54,
                  child: Center(
                    child: Text(
                      'Cancel',
                      style: TextStyle(color: Colors.white),
                    ),
                  ),
                ),
              ),
            ),
            Expanded(
              child: AbsorbPointer(
                absorbing: _editing,
                child: InkWell(
                  onTap: () {
                    if (_formKey.currentState.validate()) {
                      // EasyLoading.show(status: 'Saving...');
                      if (_image != null) {
                        //first upload image and save data
                        _provider
                            .uploadProductImage(
                                _image.path, _productNameText.text)
                            .then((url) {
                          if (url != null) {
                            _provider.updateProduct(
                              context: context,
                              productName: _productNameText.text,
                              tax: double.parse(_taxTextController.text),
                              stockQty: int.parse(_stockTextController.text),
                              sku: _skuText.text,
                              price: double.parse(_priceText.text),
                              lowStockQty:
                                  int.parse(_lowStockTextController.text),
                              comparedPrice:
                                  double.parse(_comparedPriceText.text),
                              description: _descriptionText.text,
                              collection: dropDownValue,
                              brand: _brandText.text,
                              productId: widget.productId,
                              image: image,
                              category: _categoryTextController.text,
                              subCategory: _subcategoryTextController.text,
                              categoryImage: categoryImage,
                            );
                            EasyLoading.dismiss();
                          }
                          _provider.resetProvider();
                        });
                      } else {
                        //no need to change the image, so just save new Data no need to upload image
                        _provider.updateProduct(
                          context: context,
                          productName: _productNameText.text,
                          tax: double.parse(_taxTextController.text),
                          stockQty: int.parse(_stockTextController.text),
                          sku: _skuText.text,
                          price: double.parse(_priceText.text),
                          lowStockQty: int.parse(_lowStockTextController.text),
                          comparedPrice: double.parse(_comparedPriceText.text),
                          description: _descriptionText.text,
                          collection: dropDownValue,
                          brand: _brandText.text,
                          productId: widget.productId,
                          image: image,
                          category: _categoryTextController.text,
                          subCategory: _subcategoryTextController.text,
                          categoryImage: categoryImage,
                        );
                      }
                    }
                  },
                  child: Container(
                    color: Colors.blueAccent,
                    child: Center(
                      child: Text(
                        'Save',
                        style: TextStyle(color: Colors.white),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ],
        ),
      ),
      body: doc == null
          ? Center(child: CircularProgressIndicator())
          : Form(
              key: _formKey,
              child: Padding(
                padding: EdgeInsets.all(10.0),
                child: ListView(
                  children: [
                    AbsorbPointer(
                      absorbing: _editing,
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Row(
                            mainAxisAlignment: MainAxisAlignment.spaceBetween,
                            children: [
                              Container(
                                width: 80,
                                height: 40,
                                child: TextFormField(
                                  controller: _brandText,
                                  decoration: InputDecoration(
                                      contentPadding:
                                          EdgeInsets.only(left: 10, right: 10),
                                      hintText: 'Brand',
                                      hintStyle: TextStyle(color: Colors.grey),
                                      border: OutlineInputBorder(),
                                      filled: true,
                                      fillColor:
                                          Colors.blueAccent.withOpacity(.1)),
                                ),
                              ),
                              Row(
                                children: [
                                  Text('SKU: '),
                                  Container(
                                    width: 50,
                                    child: TextFormField(
                                      controller: _skuText,
                                      style: TextStyle(fontSize: 12),
                                      decoration: InputDecoration(
                                          border: InputBorder.none,
                                          contentPadding: EdgeInsets.zero),
                                    ),
                                  ),
                                ],
                              ),
                            ],
                          ),
                          SizedBox(
                            height: 20,
                            child: TextFormField(
                              controller: _productNameText,
                              style: TextStyle(fontSize: 20),
                              decoration: InputDecoration(
                                  contentPadding: EdgeInsets.zero,
                                  border: InputBorder.none),
                            ),
                          ),
                          SizedBox(height: 20),
                          Row(
                            mainAxisSize: MainAxisSize.min,
                            children: [
                              Container(
                                width: 50,
                                child: TextFormField(
                                  controller: _priceText,
                                  style: TextStyle(fontSize: 18),
                                  decoration: InputDecoration(
                                      suffixText: '₹',
                                      contentPadding: EdgeInsets.zero,
                                      border: InputBorder.none),
                                ),
                              ),
                              SizedBox(width: 30),
                              Container(
                                width: 45,
                                child: TextFormField(
                                  controller: _comparedPriceText,
                                  style: TextStyle(
                                      fontSize: 15,
                                      decoration: TextDecoration.lineThrough),
                                  decoration: InputDecoration(
                                      suffixText: '₹',
                                      contentPadding: EdgeInsets.zero,
                                      border: InputBorder.none),
                                ),
                              ),
                              SizedBox(width: 50),
                              Container(
                                decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(4),
                                  color: Colors.red,
                                ),
                                child: Padding(
                                  padding: const EdgeInsets.all(8.0),
                                  child: Text(
                                    '${discount.toStringAsFixed(0)}% discount ',
                                    style: TextStyle(color: Colors.white),
                                  ),
                                ),
                              )
                            ],
                          ),
                          Text(
                            'Inclusive of all Taxes',
                            style: TextStyle(color: Colors.grey, fontSize: 12),
                          ),
                          InkWell(
                            onTap: () {
                              _provider.getProductImage().then((image) {
                                setState(() {
                                  _image = image;
                                });
                              });
                            },
                            child: Padding(
                              padding: const EdgeInsets.all(10.0),
                              child: _image != null
                                  ? Image.file(
                                      _image,
                                      height: 300,
                                    )
                                  : Image.network(
                                      image,
                                      height: 300,
                                    ),
                            ),
                          ),
                          Text(
                            'About This Product',
                            style: TextStyle(fontSize: 20),
                          ),
                          Padding(
                            padding: EdgeInsets.all(8),
                            child: TextFormField(
                              maxLines: null,
                              controller: _descriptionText,
                              keyboardType: TextInputType.multiline,
                              style: TextStyle(color: Colors.grey),
                              decoration:
                                  InputDecoration(border: InputBorder.none),
                            ),
                          ),
                          Padding(
                            padding: const EdgeInsets.only(top: 20, bottom: 10),
                            child: Row(
                              children: [
                                Text(
                                  'Category',
                                  style: TextStyle(
                                    color: Colors.grey,
                                    fontSize: 16,
                                  ),
                                ),
                                SizedBox(width: 10),
                                Expanded(
                                  child: AbsorbPointer(
                                    absorbing:
                                        true, //this will block user entering category name manually
                                    child: TextFormField(
                                      controller: _categoryTextController,
                                      validator: (value) {
                                        if (value.isEmpty) {
                                          return 'Select Category Name';
                                        }
                                        return null;
                                      },
                                      decoration: InputDecoration(
                                        hintText: 'not selected', //Item Code
                                        labelStyle:
                                            TextStyle(color: Colors.grey),
                                        enabledBorder: UnderlineInputBorder(
                                          borderSide: BorderSide(
                                            color: Colors.grey.shade300,
                                          ),
                                        ),
                                      ),
                                    ),
                                  ),
                                ),
                                Visibility(
                                  visible: _editing ? false : true,
                                  child: IconButton(
                                    icon: Icon(Icons.edit_outlined),
                                    onPressed: () {
                                      showDialog(
                                          context: context,
                                          builder: (BuildContext context) {
                                            return CategoryList();
                                          }).whenComplete(() {
                                        setState(() {
                                          _categoryTextController.text =
                                              _provider.selectedCategory;
                                          _visible = true;
                                        });
                                      });
                                    },
                                  ),
                                )
                              ],
                            ),
                          ),
                          Visibility(
                            visible: _visible,
                            child: Padding(
                              padding:
                                  const EdgeInsets.only(top: 10, bottom: 20),
                              child: Row(
                                children: [
                                  Text(
                                    'Sub Category',
                                    style: TextStyle(color: Colors.grey),
                                  ),
                                  SizedBox(width: 10),
                                  Expanded(
                                    child: AbsorbPointer(
                                      absorbing: true,
                                      child: TextFormField(
                                        controller: _subcategoryTextController,
                                        validator: (value) {
                                          if (value.isEmpty) {
                                            return 'Select Sub Category Name';
                                          }
                                          return null;
                                        },
                                        decoration: InputDecoration(
                                          hintText: 'not selected', //Item Code
                                          labelStyle:
                                              TextStyle(color: Colors.grey),
                                          enabledBorder: UnderlineInputBorder(
                                            borderSide: BorderSide(
                                              color: Colors.grey.shade300,
                                            ),
                                          ),
                                        ),
                                      ),
                                    ),
                                  ),
                                  IconButton(
                                    icon: Icon(Icons.edit_outlined),
                                    onPressed: () {
                                      showDialog(
                                          context: context,
                                          builder: (BuildContext context) {
                                            return SubCategoryList();
                                          }).whenComplete(() {
                                        setState(() {
                                          _subcategoryTextController.text =
                                              _provider.selectedSubCategory;
                                        });
                                      });
                                    },
                                  )
                                ],
                              ),
                            ),
                          ),
                          Container(
                            child: Row(
                              children: [
                                Text(
                                  'Collection',
                                  style: TextStyle(color: Colors.grey),
                                ),
                                SizedBox(width: 10),
                                DropdownButton<String>(
                                  hint: Text('Select a Collection'),
                                  value: dropDownValue,
                                  icon: Icon(Icons.arrow_drop_down),
                                  onChanged: (String value) {
                                    setState(() {
                                      dropDownValue = value;
                                    });
                                  },
                                  items: _collections
                                      .map<DropdownMenuItem<String>>(
                                          (String value) {
                                    return DropdownMenuItem<String>(
                                      value: value,
                                      child: Text(value),
                                    );
                                  }).toList(),
                                )
                              ],
                            ),
                          ),
                          Row(
                            children: [
                              Text(' Stock: '),
                              SizedBox(width: 20),
                              Expanded(
                                child: TextFormField(
                                  controller: _stockTextController,
                                  style: TextStyle(
                                      fontSize: 18, color: Colors.grey),
                                  decoration: InputDecoration(
                                    contentPadding: EdgeInsets.zero,
                                    border: InputBorder.none,
                                  ),
                                ),
                              ),
                            ],
                          ),
                          Row(
                            children: [
                              Text('Low Stock: '),
                              SizedBox(width: 20),
                              Expanded(
                                child: TextFormField(
                                  controller: _lowStockTextController,
                                  style: TextStyle(
                                      fontSize: 18, color: Colors.grey),
                                  decoration: InputDecoration(
                                    contentPadding: EdgeInsets.zero,
                                    border: InputBorder.none,
                                  ),
                                ),
                              ),
                            ],
                          ),
                          Row(
                            children: [
                              Text('Tax %: '),
                              SizedBox(width: 20),
                              Expanded(
                                child: TextFormField(
                                  controller: _taxTextController,
                                  style: TextStyle(
                                      fontSize: 18, color: Colors.grey),
                                  decoration: InputDecoration(
                                    contentPadding: EdgeInsets.zero,
                                    border: InputBorder.none,
                                  ),
                                ),
                              ),
                            ],
                          ),
                          SizedBox(height: 60),
                        ],
                      ),
                    )
                  ],
                ),
              ),
            ),
    );
  }
}
