import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:dotted_border/dotted_border.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:flutter_shukran/providers/coupon_provider.dart';
import 'package:provider/provider.dart';

class CouponWidget extends StatefulWidget {
  final String couponVendor;
  CouponWidget(this.couponVendor);
  @override
  _CouponWidgetState createState() => _CouponWidgetState();
}

class _CouponWidgetState extends State<CouponWidget> {
  Color color = Colors.grey;
  bool _enable = false;
  bool _visible = false;
  var _couponText = TextEditingController();
//it gives me the below error while going on the profile screen
  @override
  Widget build(BuildContext context) {
    var _coupon = Provider.of<CouponProvider>(context);
    return Container(
      color: Colors.white,
      child: Column(
        children: [
          Padding(
            padding: const EdgeInsets.only(left: 10, right: 10),
            child: Row(
              children: [
                Expanded(
                  child: SizedBox(
                    height: 35,
                    child: TextField(
                      controller: _couponText,
                      decoration: InputDecoration(
                        hintText: 'Enter Voucher Code',
                        hintStyle: TextStyle(color: Colors.grey),
                        border: InputBorder.none,
                        filled: true,
                        fillColor: Colors.grey.shade300,
                      ),
                      onChanged: (String value) {
                        if (value.length < 3) {
                          setState(() {
                            color = Colors.grey;
                            _enable = false;
                          });
                          if (value.isNotEmpty) {
                            setState(() {
                              color = Colors.blueAccent;
                              _enable = true;
                            });
                          }
                        }
                      },
                    ),
                  ),
                ),
                AbsorbPointer(
                  absorbing: _enable ? false : true,
                  child: OutlineButton(
                    borderSide: BorderSide(color: color),
                    color: Colors.blueAccent,
                    onPressed: () {
                      EasyLoading.show(status: 'Validating Coupon...');
                      _coupon
                          .getCouponDetails(
                              _couponText.text, widget.couponVendor)
                          .then((value) {
                        if (_coupon.document == null) {
                          setState(() {
                            _coupon.discountRate = 0;
                            _visible = false;
                          });
                          EasyLoading.dismiss();
                          showDialog(_couponText.text, 'Not valid');
                          return;
                        }
                        if (_coupon.expired == false) {
                          //not expired and valid
                          setState(() {
                            _visible = true;
                          });
                          EasyLoading.dismiss();
                          return;
                        }
                        if (_coupon.expired == true) {
                          //expired
                          setState(() {
                            _visible = false;
                            _coupon.discountRate = 0;
                          });
                          EasyLoading.dismiss();
                          showDialog(_couponText, 'Expired');
                          return;
                        }
                      });
                    },
                    child: Text(
                      'Apply',
                      style: TextStyle(color: color),
                    ),
                  ),
                )
              ],
            ),
          ),
          Visibility(
            visible: _visible,
            child: _coupon.document == null
                ? Container()
                : Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: DottedBorder(
                      child: Padding(
                        padding: const EdgeInsets.all(4.0),
                        child: Stack(
                          children: [
                            Container(
                              decoration: BoxDecoration(
                                borderRadius: BorderRadius.circular(6),
                                color: Colors.deepOrangeAccent.withOpacity(.4),
                              ),
                              width: MediaQuery.of(context).size.width - 80,
                              child: Column(
                                children: [
                                  Padding(
                                    padding: const EdgeInsets.only(top: 4),
                                    child: Text(_coupon.document[
                                        'title']), //${_coupon.document['title']}
                                  ),
                                  Divider(
                                    color: Colors.grey.shade800,
                                  ),
                                  Text(_coupon.document[
                                      'details']), //_coupon.document['details']
                                  Text(
                                      '${_coupon.document['discountRate']}% discount on total purchase'), //${_coupon.document['discountRate']}
                                  SizedBox(height: 10),
                                ],
                              ),
                            ),
                            Positioned(
                              right: -5,
                              top: -10,
                              child: IconButton(
                                icon: Icon(Icons.clear),
                                onPressed: () {
                                  setState(() {
                                    _coupon.discountRate = 0;
                                    _visible = false;
                                    _couponText.clear();
                                  });
                                },
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
    );
  }

  showDialog(code, validity) {
    showCupertinoDialog(
        context: context,
        builder: (BuildContext context) {
          return CupertinoAlertDialog(
            title: Text('Apply Coupon'),
            content: Text(
                'This discount coupon $code you have entered is $validity. Please try with another code'),
            actions: [
              FlatButton(
                  onPressed: () {
                    Navigator.pop(context);
                  },
                  child: Text(
                    'Ok',
                    style: TextStyle(
                        color: Colors.blueAccent, fontWeight: FontWeight.bold),
                  ))
            ],
          );
        });
  }
}
