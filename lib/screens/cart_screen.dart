import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:flutter_shukran/providers/auth_providers.dart';
import 'package:flutter_shukran/providers/cart_provider.dart';
import 'package:flutter_shukran/providers/coupon_provider.dart';
import 'package:flutter_shukran/providers/location_provider.dart';
import 'package:flutter_shukran/providers/order_provider.dart';
import 'package:flutter_shukran/screens/map_screen.dart';
import 'package:flutter_shukran/screens/payment/stripe/stripe_home.dart';
import 'package:flutter_shukran/screens/profile_screen.dart';
import 'package:flutter_shukran/services/cart_services.dart';
import 'package:flutter_shukran/services/order_services.dart';
import 'package:flutter_shukran/services/store_service.dart';
import 'package:flutter_shukran/services/user_service.dart';
import 'package:flutter_shukran/widgets/cart/cart_list.dart';
import 'package:flutter_shukran/widgets/cart/cod_toggle.dart';
import 'package:flutter_shukran/widgets/cart/coupon_widget.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

class CartScreen extends StatefulWidget {
  static const String id = 'cart_screen';
  final DocumentSnapshot document;
  CartScreen({this.document});

  @override
  _CartScreenState createState() => _CartScreenState();
}

class _CartScreenState extends State<CartScreen> {
  StoreServices _store = StoreServices();
  UserServices _userServices = UserServices();
  OrderServices _orderServices = OrderServices();
  CartServices _cartServices = CartServices();
  User user = FirebaseAuth.instance.currentUser;
  DocumentSnapshot doc;
  var textStyle = TextStyle(color: Colors.grey);
  int deliveryFee = 30;
  String _location = "";
  String _address = "";
  bool _loading = false;
  bool _checkingUser = false;
  double discount = 0;

  @override
  void initState() {
    getPrefs();
    _store.getShopDetails(widget.document['sellerUid']).then((value) {
      setState(() {
        doc = value;
      });
    });
    super.initState();
  }

  getPrefs() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    String location = prefs.getString('location');
    String address = prefs.getString('address');
    setState(() {
      _location = location;
      _address = address;
    });
  }

  @override
  Widget build(BuildContext context) {
    var _cartProvider = Provider.of<CartProvider>(context);
    final locationData = Provider.of<LocationProvider>(context);
    var userDetails = Provider.of<AuthProvider>(context);
    var _coupon = Provider.of<CouponProvider>(context);
    userDetails.getUserDetails().then((value) {
      double subTotal = _cartProvider.subTotal;
      double discountRate = _coupon.discountRate / 100;
      setState(() {
        discount = subTotal * discountRate;
      });
    });

    var _payable = _cartProvider.subTotal + deliveryFee - discount;
    var orderProvider = Provider.of<OrderProvider>(context);
    return Scaffold(
      resizeToAvoidBottomInset: false,
      backgroundColor: Colors.grey.shade200,
      bottomSheet: userDetails.snapshot == null
          ? Container()
          : Container(
              height: 140,
              color: Colors.blueGrey.shade900,
              child: Column(
                children: [
                  Container(
                    height: 80,
                    color: Colors.white,
                    child: Container(
                      width: MediaQuery.of(context).size.width,
                      child: Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Row(
                              children: [
                                Expanded(
                                  child: Text(
                                    'Deliver to this address : ',
                                    style:
                                        TextStyle(fontWeight: FontWeight.bold),
                                  ),
                                ),
                                InkWell(
                                  onTap: () {
                                    setState(() {
                                      _loading = true;
                                    });
                                    locationData
                                        .getCurrentPosition()
                                        .then((value) {
                                      setState(() {
                                        _loading = false;
                                      });
                                      if (value != null) {
                                        pushNewScreenWithRouteSettings(
                                          context,
                                          settings:
                                              RouteSettings(name: MapScreen.id),
                                          screen: MapScreen(),
                                          withNavBar: false,
                                          pageTransitionAnimation:
                                              PageTransitionAnimation.cupertino,
                                        );
                                      } else {
                                        setState(() {
                                          _loading = false;
                                        });
                                        print('Permission not Allowed');
                                      }
                                    });
                                  },
                                  child: _loading
                                      ? CircularProgressIndicator()
                                      : Text(
                                          'Change',
                                          style: TextStyle(
                                              color: Colors.blueAccent),
                                        ),
                                )
                              ],
                            ),
                            Text(
                              userDetails.snapshot['firstName'] != null
                                  ? '${userDetails.snapshot['firstName']} ${userDetails.snapshot['lastName']} : $_location , $_address'
                                  : '$_location , $_address',
                              maxLines: 3,
                              style:
                                  TextStyle(color: Colors.grey, fontSize: 12),
                            ),
                          ],
                        ),
                      ),
                    ),
                  ),
                  Center(
                    child: Padding(
                      padding:
                          const EdgeInsets.only(left: 20, right: 20, top: 5),
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            mainAxisSize: MainAxisSize.min,
                            children: [
                              Text(
                                '₹${_cartProvider.subTotal}',
                                style: TextStyle(
                                    color: Colors.white,
                                    fontWeight: FontWeight.bold,
                                    fontSize: 15),
                              ),
                              Text(
                                '(Including Taxes)',
                                style: TextStyle(color: Colors.blueAccent),
                              ),
                            ],
                          ),
                          RaisedButton(
                            child: _checkingUser
                                ? CircularProgressIndicator()
                                : Text(
                                    'CHECKOUT',
                                    style: TextStyle(
                                      color: Colors.white,
                                      fontWeight: FontWeight.bold,
                                    ),
                                  ),
                            color: Colors.blueAccent,
                            onPressed: () {
                              // EasyLoading.show(status: 'Please Wait...');
                              _userServices.getUserById(user.uid).then((value) {
                                if (value['firstName'] == null) {
                                  EasyLoading.dismiss();
                                  pushNewScreenWithRouteSettings(
                                    context,
                                    settings:
                                        RouteSettings(name: ProfileScreen.id),
                                    screen: ProfileScreen(),
                                    pageTransitionAnimation:
                                        PageTransitionAnimation.cupertino,
                                  );

                                  //confirm payment Method
                                } else {
                                  //EasyLoading.show(status: 'Please Wait...');
                                  //TODO payment gateway integration
                                  if (_cartProvider.cod == false) {
                                    //pay online
                                    orderProvider.totalAmount(_payable);
                                    Navigator.pushNamed(context, StripeHome.id)
                                        .whenComplete(() {
                                      if (orderProvider.success == true) {
                                        _saveOrder(_cartProvider, _payable,
                                            _coupon, orderProvider);
                                      }
                                    });
                                  } else {
                                    //cash on delivery;
                                    _saveOrder(_cartProvider, _payable, _coupon,
                                        orderProvider);
                                  }
                                }
                              });
                              // pushNewScreenWithRouteSettings(
                              //   context,
                              //   settings: RouteSettings(name: ProfileScreen.id),
                              //   screen: ProfileScreen(),
                              //   pageTransitionAnimation:
                              //       PageTransitionAnimation.cupertino,
                              // );
                            },
                          )
                        ],
                      ),
                    ),
                  ),
                ],
              ),
            ),
      body: NestedScrollView(
        headerSliverBuilder: (BuildContext context, bool innerBoxIsScrolled) {
          return [
            SliverAppBar(
              floating: true,
              snap: true,
              backgroundColor: Colors.blueAccent,
              elevation: 5,
              title: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    widget.document['shopName'] != null
                        ? widget.document['shopName']
                        : '',
                    style: TextStyle(fontSize: 16, color: Colors.white),
                  ),
                  SizedBox(height: 5),
                  Row(
                    children: [
                      Text(
                        '${_cartProvider.cartQty} ${_cartProvider.cartQty > 1 ? 'Items,' : 'Item,'}',
                        style: TextStyle(color: Colors.white, fontSize: 10),
                      ),
                      SizedBox(width: 12),
                      Text(
                        'To Pay :  ₹ ${_cartProvider.subTotal}',
                        style: TextStyle(color: Colors.white, fontSize: 10),
                      ),
                    ],
                  ),
                ],
              ),
            ),
          ];
        },
        body: doc == null
            ? Center(child: CircularProgressIndicator())
            : _cartProvider.cartQty > 0
                ? SingleChildScrollView(
                    padding: EdgeInsets.only(bottom: 80),
                    child: Container(
                      padding: EdgeInsets.only(
                          bottom: MediaQuery.of(context).viewInsets.bottom),
                      child: Column(
                        children: [
                          if (doc != null)
                            Container(
                              color: Colors.white,
                              child: Column(
                                children: [
                                  ListTile(
                                    tileColor: Colors.white,
                                    leading: Container(
                                      height: 60,
                                      width: 60,
                                      child: ClipRRect(
                                        borderRadius: BorderRadius.circular(4),
                                        child: Image.network(
                                          doc['imageUrl'],
                                          fit: BoxFit.cover,
                                        ),
                                      ),
                                    ),
                                    title: Text(doc['shopName']),
                                    subtitle: Text(
                                      doc['address'],
                                      maxLines: 1,
                                      style: TextStyle(
                                          color: Colors.grey, fontSize: 12),
                                    ),
                                  ),
                                  CodToggleSwitch(),
                                ],
                              ),
                            ),
                          Divider(
                            color: Colors.grey.shade300,
                          ),
                          CartList(
                            document: widget.document,
                          ),
                          //coupon
                          CouponWidget(doc['uid']),

                          //bill details card
                          Padding(
                            padding: const EdgeInsets.only(
                                left: 4, right: 4, top: 4, bottom: 80),
                            child: SizedBox(
                              width: MediaQuery.of(context).size.width,
                              child: Card(
                                child: Padding(
                                  padding: const EdgeInsets.all(8.0),
                                  child: Column(
                                    crossAxisAlignment:
                                        CrossAxisAlignment.start,
                                    children: [
                                      Text(
                                        'Bill Details',
                                        style: TextStyle(
                                            fontWeight: FontWeight.bold),
                                      ),
                                      SizedBox(height: 10),
                                      Row(
                                        children: [
                                          Expanded(
                                              child: Text(
                                            'Basket Value: ',
                                            style: textStyle,
                                          )),
                                          Text(
                                            '₹${_cartProvider.subTotal.toString()}',
                                            style: textStyle,
                                          ),
                                        ],
                                      ),
                                      SizedBox(height: 10),
                                      if (discount > 0)
                                        Row(
                                          children: [
                                            Expanded(
                                                child: Text(
                                              'Discount: ',
                                              style: textStyle,
                                            )),
                                            Text(
                                              '₹${discount.toStringAsFixed(0)}',
                                              style: textStyle,
                                            ),
                                          ],
                                        ),
                                      SizedBox(height: 10),
                                      Row(
                                        children: [
                                          Expanded(
                                              child: Text(
                                            'Delivery Fee: ',
                                            style: textStyle,
                                          )),
                                          Text(
                                            '₹$deliveryFee',
                                            style: textStyle,
                                          ),
                                        ],
                                      ),
                                      Divider(
                                        color: Colors.grey,
                                      ),
                                      Row(
                                        children: [
                                          Expanded(
                                              child: Text(
                                            'Total amount payable: ',
                                            style: TextStyle(
                                                fontWeight: FontWeight.bold),
                                          )),
                                          Text(
                                            '₹$_payable',
                                            style: TextStyle(
                                                fontWeight: FontWeight.bold),
                                          ),
                                        ],
                                      ),
                                      SizedBox(height: 10),
                                      Container(
                                        decoration: BoxDecoration(
                                          borderRadius:
                                              BorderRadius.circular(4),
                                          color:
                                              Colors.blueAccent.withOpacity(.3),
                                        ),
                                        child: Padding(
                                          padding: const EdgeInsets.all(8.0),
                                          child: Row(
                                            children: [
                                              Expanded(
                                                  child: Text(
                                                'Total Saving',
                                                style: TextStyle(
                                                    color: Colors.blueAccent),
                                              )),
                                              Text(
                                                '₹$_payable',
                                                style: TextStyle(
                                                    color: Colors.blueAccent),
                                              ),
                                            ],
                                          ),
                                        ),
                                      )
                                    ],
                                  ),
                                ),
                              ),
                            ),
                          )
                        ],
                      ),
                    ),
                  )
                : Center(
                    child: Text('Cart is Empty, Continue Shopping'),
                  ),
      ),
    );
  }

  _saveOrder(CartProvider cartProvider, payable, CouponProvider coupon,
      OrderProvider orderProvider) {
    _orderServices.saveOrder({
      'products': cartProvider.cartList,
      'userId': user.uid,
      'deliveryFee': deliveryFee,
      'total': payable,
      'discount': discount.toStringAsFixed(0),
      'cod': cartProvider.cod, //cod or not
      'discountCode': coupon.document == null ? null : coupon.document['title'],
      'seller': {
        'shopName': widget.document['shopName'],
        'sellerId': widget.document['sellerUid'],
      },
      'timeStamp': DateTime.now().toString(),
      'orderStatus': 'Ordered',
      'deliveryBoy': {
        'email': '',
        'name': '',
        'phone': '',
        'location': '',
      }
    }).then((value) {
      orderProvider.success = false;
      _cartServices.deleteCart().then((value) {
        _cartServices.checkData().then((value) {
          EasyLoading.showSuccess('Your order is submitted');
          Navigator.pop(context); //closes cart Screen
        });
      });
    });
  }
}
