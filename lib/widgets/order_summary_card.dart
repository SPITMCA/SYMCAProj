import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:shukrann_delivery_boy/services/firebase_services.dart';
import 'package:intl/intl.dart';
import 'package:shukrann_delivery_boy/services/order_services.dart';
import 'package:url_launcher/url_launcher.dart';

class OrderSummaryCard extends StatefulWidget {
  final DocumentSnapshot document;
  OrderSummaryCard(this.document);

  @override
  _OrderSummaryCardState createState() => _OrderSummaryCardState();
}

class _OrderSummaryCardState extends State<OrderSummaryCard> {
  User user = FirebaseAuth.instance.currentUser;
  OrderServices _orderServices = OrderServices();
  FirebaseServices _services = FirebaseServices();
  DocumentSnapshot _customer;
  @override
  void initState() {
    _services.getCustomerDetails(widget.document['userId']).then((value) {
      if (value != null) {
        setState(() {
          _customer = value;
        });
      } else {
        print('no data');
      }
    });
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 4),
      child: Container(
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(10),
        ),
        child: Column(
          children: [
            ListTile(
              horizontalTitleGap: 0,
              leading: CircleAvatar(
                  backgroundColor: Colors.white,
                  radius: 15,
                  child: _orderServices.statusIcon(widget.document)),
              title: Text(
                widget.document['orderStatus'],
                style: TextStyle(
                    fontSize: 12,
                    color: _orderServices.statusColor(widget.document),
                    fontWeight: FontWeight.bold),
              ),
              subtitle: Text(
                'On ${DateFormat.yMMMd().format(
                  DateTime.parse(widget.document['timeStamp']),
                )}',
                style: TextStyle(fontSize: 12),
              ),
              trailing: Column(
                crossAxisAlignment: CrossAxisAlignment.end,
                mainAxisSize: MainAxisSize.min,
                children: [
                  Text(
                    'Payment Type :  ${widget.document['cod'] == true ? 'Cash on Delivery' : 'Online Payment'}',
                    style: TextStyle(fontSize: 12, fontWeight: FontWeight.bold),
                  ),
                  SizedBox(height: 5),
                  Text(
                    'Amount :  ₹${widget.document['total'].toStringAsFixed(0)}',
                    style: TextStyle(fontSize: 12, fontWeight: FontWeight.bold),
                  ),
                ],
              ),
            ),
            //Customer Details
            _customer != null
                ? ListTile(
                    title: Row(
                      children: [
                        Text(
                          'Customer: ',
                          style: TextStyle(
                              fontWeight: FontWeight.bold, fontSize: 14),
                        ),
                        Text(
                          '${_customer['firstName']} ${_customer['lastName']}',
                          style: TextStyle(
                              fontSize: 12, fontWeight: FontWeight.bold),
                        ),
                      ],
                    ),
                    subtitle: Text(
                      _customer['address'],
                      style: TextStyle(fontSize: 12),
                      overflow: TextOverflow.ellipsis,
                    ),
                    trailing: Row(
                      mainAxisSize: MainAxisSize.min,
                      children: [
                        InkWell(
                          onTap: () {
                            _orderServices.launchMap(_customer['latitude'],
                                _customer['longitude'], _customer['firstName']);
                          },
                          child: Container(
                            decoration: BoxDecoration(
                                color: Colors.blueAccent,
                                borderRadius: BorderRadius.circular(4)),
                            child: Padding(
                              padding: const EdgeInsets.only(
                                  left: 8, right: 8, top: 2, bottom: 2),
                              child: Icon(
                                Icons.map,
                                size: 20,
                                color: Colors.white,
                              ),
                            ),
                          ),
                        ),
                        SizedBox(width: 10),
                        InkWell(
                          onTap: () {
                            launch('tel:${_customer['number']}');
                          },
                          child: Container(
                            decoration: BoxDecoration(
                                color: Colors.blueAccent,
                                borderRadius: BorderRadius.circular(4)),
                            child: Padding(
                              padding: const EdgeInsets.only(
                                  left: 8, right: 8, top: 2, bottom: 2),
                              child: Icon(
                                Icons.phone_in_talk,
                                size: 20,
                                color: Colors.white,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                  )
                : Container(),
            ExpansionTile(
              title: Text(
                'Order Details',
                style: TextStyle(fontSize: 10),
              ),
              subtitle: Text(
                'View Order Details',
                style: TextStyle(fontSize: 12, color: Colors.grey),
              ),
              children: [
                ListView.builder(
                  shrinkWrap: true,
                  physics: NeverScrollableScrollPhysics(),
                  itemBuilder: (BuildContext context, int index) {
                    return ListTile(
                      leading: CircleAvatar(
                        radius: 20,
                        backgroundColor: Colors.white,
                        child: Image.network(
                            widget.document['products'][index]['productImage']),
                      ),
                      title: Text(
                        widget.document['products'][index]['productName'],
                        style: TextStyle(fontSize: 12),
                      ),
                      subtitle: Text(
                        '${widget.document['products'][index]['qty']} x ₹${widget.document['products'][index]['price'].toStringAsFixed(0)}  =  ₹ ${widget.document['products'][index]['total'].toStringAsFixed(0)}',
                        style: TextStyle(color: Colors.grey, fontSize: 12),
                      ),
                    );
                  },
                  itemCount: widget.document['products'].length,
                ),
                Padding(
                  padding: const EdgeInsets.only(
                      left: 12, right: 12, top: 8, bottom: 8),
                  child: Card(
                    elevation: 4,
                    child: Padding(
                      padding: const EdgeInsets.all(8.0),
                      child: Column(
                        children: [
                          Row(
                            children: [
                              Text(
                                'Seller:',
                                style: TextStyle(
                                    fontSize: 12, fontWeight: FontWeight.bold),
                              ),
                              Text(
                                ' ${widget.document['seller']['shopName']}',
                                style:
                                    TextStyle(color: Colors.grey, fontSize: 12),
                              )
                            ],
                          ),
                          SizedBox(height: 10),
                          int.parse(widget.document['discount']) > 0
                              ? Container(
                                  child: Column(
                                    children: [
                                      Row(
                                        children: [
                                          Text(
                                            'Discount:',
                                            style: TextStyle(
                                                fontSize: 12,
                                                fontWeight: FontWeight.bold),
                                          ),
                                          Text(
                                            ' ${widget.document['discount']}',
                                            style: TextStyle(
                                                color: Colors.grey,
                                                fontSize: 12),
                                          )
                                        ],
                                      ),
                                      SizedBox(height: 10),
                                      Row(
                                        children: [
                                          Text(
                                            'Discount Code:',
                                            style: TextStyle(
                                                fontSize: 12,
                                                fontWeight: FontWeight.bold),
                                          ),
                                          Text(
                                            ' ${widget.document['discountCode']}',
                                            style: TextStyle(
                                                color: Colors.grey,
                                                fontSize: 12),
                                          )
                                        ],
                                      ),
                                    ],
                                  ),
                                )
                              : Container(),
                          SizedBox(height: 10),
                          Row(
                            children: [
                              Text(
                                'Delivery Fee:  ',
                                style: TextStyle(
                                    fontSize: 12, fontWeight: FontWeight.bold),
                              ),
                              Text(
                                '₹ ${widget.document['deliveryFee']}',
                                style:
                                    TextStyle(color: Colors.grey, fontSize: 12),
                              )
                            ],
                          ),
                        ],
                      ),
                    ),
                  ),
                )
              ],
            ),
            _orderServices.statusContainer(widget.document, context),
          ],
        ),
      ),
    );
  }
}
