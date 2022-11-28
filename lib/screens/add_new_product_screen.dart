import 'dart:io';

import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:provider/provider.dart';
import 'package:shukran_vendor/providers/product_provider.dart';
import 'package:shukran_vendor/widgets/category_list_widget.dart';

class AddNewProduct extends StatefulWidget {
  static const String id = 'add_new_product';
  const AddNewProduct({Key key}) : super(key: key);

  @override
  _AddNewProductState createState() => _AddNewProductState();
}

class _AddNewProductState extends State<AddNewProduct> {
  final _formKey = GlobalKey<FormState>();

  List<String> _collections = [
    'Featured Products',
    'Best Selling',
    'Recently Added',
  ];
  String dropDownValue;

  var _categoryTextController = TextEditingController();
  var _subcategoryTextController = TextEditingController();
  var _comparedPriceTextController = TextEditingController();
  var _brandTextController = TextEditingController();
  var _lowStockTextController = TextEditingController();
  var _stockTextController = TextEditingController();
  File _image;
  bool _visible = false;
  bool _track = false;

  String productName;
  String description;
  double price;
  double comparedPrice;
  String sku;
  double tax;

  @override
  Widget build(BuildContext context) {
    var _provider = Provider.of<ProductProvider>(context);
    return DefaultTabController(
      length: 2,
      initialIndex: 1,
      child: Scaffold(
        appBar: AppBar(),
        body: Form(
          key: _formKey,
          child: Column(
            children: [
              Material(
                elevation: 3,
                child: Padding(
                  padding: const EdgeInsets.all(10.0),
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Container(
                        child: Text(
                          'Products/Add New',
                        ),
                      ),
                      FlatButton.icon(
                        color: Colors.blueAccent,
                        onPressed: () {
                          if (_formKey.currentState.validate()) {
                            //only if necessary field
                            if (_categoryTextController.text.isNotEmpty) {
                              if (_subcategoryTextController.text.isNotEmpty) {
                                if (_image != null) {
                                  //image should be selected
                                  // upload image to storage
                                  EasyLoading.show(status: 'Saving...');
                                  _provider
                                      .uploadProductImage(
                                          _image.path, productName)
                                      .then((url) {
                                    if (url != null) {
                                      EasyLoading.dismiss();
                                      //upload to fireStore
                                      _provider.saveProductDataToDb(
                                        context: context,
                                        comparedPrice: int.parse(
                                            _comparedPriceTextController.text),
                                        collection: dropDownValue,
                                        description: description,
                                        lowStockQty: int.parse(
                                            _lowStockTextController.text),
                                        price: price,
                                        sku: sku,
                                        stockQty: int.parse(
                                            _stockTextController.text),
                                        tax: tax,
                                        brand: _brandTextController.text,
                                        productName: productName,
                                      );
                                      setState(() {
                                        _formKey.currentState.reset();
                                        _stockTextController.clear();
                                        dropDownValue = null;
                                        _comparedPriceTextController.clear();
                                        _subcategoryTextController.clear();
                                        _lowStockTextController.clear();
                                        _track = false;
                                        _categoryTextController.clear();
                                        _image = null;
                                        _visible = false;
                                        _brandTextController.clear();
                                      });
                                    } else {
                                      _provider.alertDialog(
                                        context: context,
                                        title: 'IMAGE UPLOAD',
                                        content: 'Failed To Upload',
                                      );
                                    }
                                  });
                                } else {
                                  //image not selected
                                  _provider.alertDialog(
                                    context: context,
                                    title: 'Product Image',
                                    content: 'Product Image not selected',
                                  );
                                }
                              } else {
                                _provider.alertDialog(
                                    context: context,
                                    title: 'Sub Category',
                                    content: 'Sub Category not selected');
                              }
                            } else {
                              _provider.alertDialog(
                                  context: context,
                                  title: 'Main Category',
                                  content: 'Main Category not selected');
                            }
                          }
                        },
                        icon: Icon(
                          Icons.save,
                          color: Colors.white,
                        ),
                        label: Text(
                          'SAVE',
                          style: TextStyle(color: Colors.white),
                        ),
                      ),
                    ],
                  ),
                ),
              ),
              TabBar(
                indicatorColor: Colors.blueAccent,
                labelColor: Colors.blueAccent,
                unselectedLabelColor: Colors.black54,
                tabs: [
                  Tab(text: 'General'),
                  Tab(text: 'INVENTORY'),
                ],
              ),
              Expanded(
                child: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Card(
                    child: TabBarView(
                      children: [
                        ListView(
                          children: [
                            Padding(
                              padding: const EdgeInsets.all(10.0),
                              child: Column(
                                children: [
                                  TextFormField(
                                    validator: (value) {
                                      if (value.isEmpty) {
                                        return 'Enter Product Name ';
                                      }
                                      setState(() {
                                        productName = value;
                                      });
                                      return null;
                                    },
                                    decoration: InputDecoration(
                                      labelText: 'Product Name *',
                                      labelStyle: TextStyle(color: Colors.grey),
                                      enabledBorder: UnderlineInputBorder(
                                        borderSide: BorderSide(
                                          color: Colors.grey.shade300,
                                        ),
                                      ),
                                    ),
                                  ),
                                  TextFormField(
                                    maxLines: 5,
                                    maxLength: 1000,
                                    validator: (value) {
                                      if (value.isEmpty) {
                                        return 'Enter Description ';
                                      }
                                      setState(() {
                                        description = value;
                                      });
                                      return null;
                                    },
                                    decoration: InputDecoration(
                                      labelText: 'About Product *',
                                      labelStyle: TextStyle(color: Colors.grey),
                                      enabledBorder: UnderlineInputBorder(
                                        borderSide: BorderSide(
                                          color: Colors.grey.shade300,
                                        ),
                                      ),
                                    ),
                                  ),
                                  SizedBox(height: 10),
                                  Padding(
                                    padding: const EdgeInsets.all(10.0),
                                    child: InkWell(
                                      onTap: () {
                                        _provider
                                            .getProductImage()
                                            .then((image) {
                                          setState(() {
                                            _image = image;
                                          });
                                        });
                                      },
                                      child: SizedBox(
                                        width: 150,
                                        height: 150,
                                        child: Card(
                                          elevation: 5,
                                          child: Center(
                                              child: _image == null
                                                  ? Text('Select Image')
                                                  : Image.file(_image)),
                                        ),
                                      ),
                                    ),
                                  ),
                                  SizedBox(height: 10),
                                  TextFormField(
                                    validator: (value) {
                                      if (value.isEmpty) {
                                        return 'Enter Selling Price ';
                                      }
                                      setState(() {
                                        price = double.parse(value);
                                      });
                                      return null;
                                    },
                                    keyboardType: TextInputType.number,
                                    decoration: InputDecoration(
                                      labelText:
                                          'Price *', //final selling price
                                      labelStyle: TextStyle(color: Colors.grey),
                                      enabledBorder: UnderlineInputBorder(
                                        borderSide: BorderSide(
                                          color: Colors.grey.shade300,
                                        ),
                                      ),
                                    ),
                                  ),
                                  TextFormField(
                                    controller: _comparedPriceTextController,
                                    validator: (value) {
                                      // if (value.isEmpty) {
                                      //   return 'Enter Compared Price ';
                                      // }
                                      if (price > double.parse(value)) {
                                        return 'Compared Price should be higher than selling price';
                                      }
                                      // setState(() {
                                      //   comparedPrice = double.parse(value);
                                      // });
                                      return null;
                                    },
                                    keyboardType: TextInputType.number,
                                    decoration: InputDecoration(
                                      labelText:
                                          'Compared Price *', //Price Before Discount
                                      labelStyle: TextStyle(color: Colors.grey),
                                      enabledBorder: UnderlineInputBorder(
                                        borderSide: BorderSide(
                                          color: Colors.grey.shade300,
                                        ),
                                      ),
                                    ),
                                  ),
                                  SizedBox(height: 10),
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
                                  TextFormField(
                                    controller: _brandTextController,
                                    decoration: InputDecoration(
                                      labelText: 'Brand ',
                                      labelStyle: TextStyle(color: Colors.grey),
                                      enabledBorder: UnderlineInputBorder(
                                        borderSide: BorderSide(
                                          color: Colors.grey.shade300,
                                        ),
                                      ),
                                    ),
                                  ),
                                  TextFormField(
                                    validator: (value) {
                                      if (value.isEmpty) {
                                        return 'Enter SKU';
                                      }
                                      setState(() {
                                        sku = value;
                                      });
                                      return null;
                                    },
                                    decoration: InputDecoration(
                                      labelText: 'SKU', //Item Code
                                      labelStyle: TextStyle(color: Colors.grey),
                                      enabledBorder: UnderlineInputBorder(
                                        borderSide: BorderSide(
                                          color: Colors.grey.shade300,
                                        ),
                                      ),
                                    ),
                                  ),
                                  Padding(
                                    padding: const EdgeInsets.only(
                                        top: 20, bottom: 10),
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
                                              controller:
                                                  _categoryTextController,
                                              validator: (value) {
                                                if (value.isEmpty) {
                                                  return 'Select Category Name';
                                                }
                                                return null;
                                              },
                                              decoration: InputDecoration(
                                                hintText:
                                                    'not selected', //Item Code
                                                labelStyle: TextStyle(
                                                    color: Colors.grey),
                                                enabledBorder:
                                                    UnderlineInputBorder(
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
                                                builder:
                                                    (BuildContext context) {
                                                  return CategoryList();
                                                }).whenComplete(() {
                                              setState(() {
                                                _categoryTextController.text =
                                                    _provider.selectedCategory;
                                                _visible = true;
                                              });
                                            });
                                          },
                                        )
                                      ],
                                    ),
                                  ),
                                  Visibility(
                                    visible: _visible,
                                    child: Padding(
                                      padding: const EdgeInsets.only(
                                          top: 10, bottom: 20),
                                      child: Row(
                                        children: [
                                          Text(
                                            'Sub Category',
                                            style:
                                                TextStyle(color: Colors.grey),
                                          ),
                                          SizedBox(width: 10),
                                          Expanded(
                                            child: AbsorbPointer(
                                              absorbing: true,
                                              child: TextFormField(
                                                controller:
                                                    _subcategoryTextController,
                                                validator: (value) {
                                                  if (value.isEmpty) {
                                                    return 'Select Sub Category Name';
                                                  }
                                                  return null;
                                                },
                                                decoration: InputDecoration(
                                                  hintText:
                                                      'not selected', //Item Code
                                                  labelStyle: TextStyle(
                                                      color: Colors.grey),
                                                  enabledBorder:
                                                      UnderlineInputBorder(
                                                    borderSide: BorderSide(
                                                      color:
                                                          Colors.grey.shade300,
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
                                                  builder:
                                                      (BuildContext context) {
                                                    return SubCategoryList();
                                                  }).whenComplete(() {
                                                setState(() {
                                                  _subcategoryTextController
                                                          .text =
                                                      _provider
                                                          .selectedSubCategory;
                                                });
                                              });
                                            },
                                          )
                                        ],
                                      ),
                                    ),
                                  ),
                                  TextFormField(
                                    validator: (value) {
                                      if (value.isEmpty) {
                                        return 'Please enter Tax %';
                                      }
                                      setState(() {
                                        tax = double.parse(value);
                                      });
                                      return null;
                                    },
                                    keyboardType: TextInputType.number,
                                    decoration: InputDecoration(
                                      labelText: 'Tax %', //Item Code
                                      labelStyle: TextStyle(color: Colors.grey),
                                      enabledBorder: UnderlineInputBorder(
                                        borderSide: BorderSide(
                                          color: Colors.grey.shade300,
                                        ),
                                      ),
                                    ),
                                  ),
                                ],
                              ),
                            )
                          ],
                        ),
                        SingleChildScrollView(
                          child: Column(
                            children: [
                              SwitchListTile(
                                title: Text('Track Inventory'),
                                activeColor: Colors.blueAccent,
                                subtitle: Text(
                                  'Switch ON to track Inventory',
                                  style: TextStyle(
                                      color: Colors.grey, fontSize: 12),
                                ),
                                value: _track,
                                onChanged: (selected) {
                                  setState(() {
                                    _track = !_track;
                                  });
                                },
                              ),
                              Visibility(
                                visible: _track,
                                child: SizedBox(
                                  height: 300,
                                  width: double.infinity,
                                  child: Card(
                                    elevation: 3,
                                    child: Padding(
                                      padding: const EdgeInsets.all(10.0),
                                      child: Column(
                                        children: [
                                          TextFormField(
                                            controller: _stockTextController,
                                            keyboardType: TextInputType.number,
                                            decoration: InputDecoration(
                                              labelText:
                                                  'Inventory Quantity', //Item Code
                                              labelStyle:
                                                  TextStyle(color: Colors.grey),
                                              enabledBorder:
                                                  UnderlineInputBorder(
                                                borderSide: BorderSide(
                                                  color: Colors.grey.shade300,
                                                ),
                                              ),
                                            ),
                                          ),
                                          TextFormField(
                                            controller: _lowStockTextController,
                                            keyboardType: TextInputType.number,
                                            decoration: InputDecoration(
                                              labelText:
                                                  'Inventory low stock Quantity', //Item Code
                                              labelStyle:
                                                  TextStyle(color: Colors.grey),
                                              enabledBorder:
                                                  UnderlineInputBorder(
                                                borderSide: BorderSide(
                                                  color: Colors.grey.shade300,
                                                ),
                                              ),
                                            ),
                                          ),
                                        ],
                                      ),
                                    ),
                                  ),
                                ),
                              )
                            ],
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
