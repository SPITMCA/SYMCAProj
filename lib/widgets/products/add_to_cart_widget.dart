import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:flutter_shukran/services/cart_services.dart';
import 'package:flutter_shukran/widgets/cart/counter_widget.dart';

class AddToCartWidget extends StatefulWidget {
  final DocumentSnapshot document;
  AddToCartWidget(this.document);
  @override
  _AddToCartWidgetState createState() => _AddToCartWidgetState();
}

class _AddToCartWidgetState extends State<AddToCartWidget> {
  CartServices _cart = CartServices();
  User user = FirebaseAuth.instance.currentUser;
  bool _loading = true;
  bool _exist = false;
  int _qty = 1;
  String _docId;

  @override
  void initState() {
    getCartData(); //while opening product detail screen,first check  if the product is already in the cart
    super.initState();
  }

  getCartData() async {
    final snapshot =
        await _cart.cart.doc(user.uid).collection('products').get();
    //if the product is not added
    if (snapshot.docs.length == 0) {
      setState(() {
        _loading = false;
      });
    } else {
      setState(() {
        _loading = false;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    FirebaseFirestore.instance
        .collection('cart')
        .doc(user.uid)
        .collection('products')
        .where('productId', isEqualTo: widget.document['productId'])
        .get()
        .then((QuerySnapshot querySnapshot) {
      querySnapshot.docs.forEach((doc) {
        if (doc['productId'] == widget.document['productId']) {
          //means product is already in the cart,so no need to add to cart again
          setState(() {
            _exist = true;
            _qty = doc['qty'];
            _docId = doc.id;
          });
        }
      });
    });

    return _loading
        ? Container(
            height: 56,
            child: Center(
              child: CircularProgressIndicator(
                valueColor: AlwaysStoppedAnimation<Color>(Colors.blueAccent),
              ),
            ),
          )
        : _exist
            ? CounterWidget(
                document: widget.document,
                qty: _qty,
                docId: _docId,
              )
            : InkWell(
                onTap: () {
                  EasyLoading.show(status: 'Adding...');
                  _cart.addToCart(widget.document).then((value) {
                    setState(() {
                      _exist = true;
                    });
                  });
                  EasyLoading.showSuccess('Added to Cart');
                },
                child: Container(
                  height: 56,
                  color: Colors.blueAccent,
                  child: Center(
                    child: Padding(
                      padding: const EdgeInsets.all(8.0),
                      child: Row(
                        mainAxisSize: MainAxisSize.min,
                        children: [
                          Icon(
                            CupertinoIcons.bag,
                            color: Colors.white,
                          ),
                          SizedBox(width: 10),
                          Text(
                            'Add to Cart',
                            style: TextStyle(color: Colors.white),
                          ),
                        ],
                      ),
                    ),
                  ),
                ),
              );
  }
}
