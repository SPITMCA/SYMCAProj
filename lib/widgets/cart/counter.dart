import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:flutter_shukran/services/cart_services.dart';

class CounterForCard extends StatefulWidget {
  final DocumentSnapshot document;

  CounterForCard(this.document);

  @override
  _CounterForCardState createState() => _CounterForCardState();
}

class _CounterForCardState extends State<CounterForCard> {
  User user = FirebaseAuth.instance.currentUser;
  CartServices _cart = CartServices();

  int _qty = 1;
  String _docId;
  bool _exist = false;
  bool _updating = false;

  getCartData() {
    FirebaseFirestore.instance
        .collection('cart')
        .doc(user.uid)
        .collection('products')
        .where('productId', isEqualTo: widget.document['productId'])
        .get()
        .then((QuerySnapshot querySnapshot) {
      if (querySnapshot.docs.isNotEmpty) {
        querySnapshot.docs.forEach((doc) {
          if (doc['productId'] == widget.document['productId']) {
            //means product is already in the cart,so no need to add to cart again
            if (mounted) {
              setState(() {
                _qty = doc['qty'];
                _exist = true;
                _docId = doc.id;
              });
            }
          }
        });
      } else {
        if (mounted) {
          setState(() {
            _exist = false;
          });
        }
      }
    });
  }

  @override
  void initState() {
    getCartData();

    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return _exist
        ? StreamBuilder(
            stream: getCartData(),
            builder: (BuildContext context, AsyncSnapshot<dynamic> snapshot) {
              return Container(
                height: 28,
                decoration: BoxDecoration(
                    border: Border.all(
                      color: Colors.blueAccent,
                    ),
                    borderRadius: BorderRadius.circular(4)),
                child: Row(
                  children: [
                    InkWell(
                      onTap: () {
                        setState(() {
                          _updating = true;
                        });
                        if (_qty == 1) {
                          _cart.removeFromCart(_docId).then((value) {
                            setState(() {
                              _updating = false;
                              _exist = false;
                            });
                            _cart.checkData();
                          });
                        }
                        if (_qty > 1) {
                          setState(() {
                            _qty--;
                          });
                          var total = _qty * widget.document['price'];
                          _cart
                              .updateCartQty(_docId, _qty, total)
                              .then((value) {
                            setState(() {
                              _updating = false;
                            });
                          });
                        }
                      },
                      child: Container(
                        child: Icon(
                          _qty == 1 ? Icons.delete_outline : Icons.remove,
                          color: Colors.blueAccent,
                        ),
                      ),
                    ),
                    Container(
                      height: double.infinity,
                      width: 30,
                      color: Colors.blueAccent,
                      child: Center(
                        child: FittedBox(
                          child: _updating
                              ? Padding(
                                  padding: const EdgeInsets.all(8.0),
                                  child: CircularProgressIndicator(
                                    valueColor: AlwaysStoppedAnimation<Color>(
                                        Colors.white),
                                  ),
                                )
                              : Text(
                                  _qty.toString(),
                                  style: TextStyle(color: Colors.white),
                                ),
                        ),
                      ),
                    ),
                    InkWell(
                      onTap: () {
                        setState(() {
                          _updating = true;
                          _qty++;
                        });
                        var total = _qty * widget.document['price'];
                        _cart.updateCartQty(_docId, _qty, total).then((value) {
                          setState(() {
                            _updating = false;
                          });
                        });
                      },
                      child: Container(
                        child: Icon(
                          Icons.add,
                          color: Colors.blueAccent,
                        ),
                      ),
                    ),
                  ],
                ),
              );
            })
        : StreamBuilder(
            stream: getCartData(),
            builder: (BuildContext context, AsyncSnapshot<dynamic> snapshot) {
              return InkWell(
                onTap: () {
                  EasyLoading.show(status: 'Adding...');
                  _cart.checkSeller().then((shopName) {
                    if (shopName == widget.document['seller']['shopName']) {
                      //product from same seller
                      setState(() {
                        _exist = true;
                      });
                      _cart.addToCart(widget.document).then((value) {
                        EasyLoading.showSuccess('Added To cart');
                      });
                      return;
                    }
                    if (shopName == null) {
                      setState(() {
                        _exist = true;
                      });
                      _cart.addToCart(widget.document).then((value) {
                        EasyLoading.showSuccess('Added To cart');
                      });
                      return;
                    }
                    if (shopName != widget.document['seller']['shopName']) {
                      EasyLoading.dismiss();
                      showDialog(shopName);
                    }
                  });
                },
                child: Container(
                  height: 28,
                  decoration: BoxDecoration(
                    color: Colors.blueAccent,
                    borderRadius: BorderRadius.circular(4),
                  ),
                  child: Center(
                    child: Padding(
                      padding: const EdgeInsets.only(left: 30, right: 30),
                      child: Text(
                        'Add',
                        style: TextStyle(color: Colors.white),
                      ),
                    ),
                  ),
                ),
              );
            },
          );
  }

  showDialog(shopName) {
    showCupertinoDialog(
        context: context,
        builder: (BuildContext context) {
          return CupertinoAlertDialog(
            title: Text('Replace Cart Item?'),
            content: Text(
                'Your cart Contains items from $shopName. Do you want to discard the selection and add items from ${widget.document['seller']['shopName']}'),
            actions: [
              FlatButton(
                onPressed: () {
                  Navigator.pop(context);
                },
                child: Text(
                  'NO',
                  style: TextStyle(
                    color: Colors.blueAccent,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
              FlatButton(
                onPressed: () {
                  _cart.cart.doc(user.uid).delete();
                  _cart.deleteCart().then((value) {
                    _cart.addToCart(widget.document).then((value) {
                      setState(() {
                        _exist = true;
                      });
                      Navigator.pop(context);
                    });
                  });
                },
                child: Text(
                  'Yes',
                  style: TextStyle(
                    color: Colors.blueAccent,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
            ],
          );
        });
  }
}
