import 'package:chips_choice/chips_choice.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/rendering.dart';
import 'package:flutter_shukran/providers/order_provider.dart';
import 'package:flutter_shukran/services/order_services.dart';
import 'package:intl/intl.dart';
import 'package:provider/provider.dart';

class MyOrdersScreen extends StatefulWidget {
  static const String id = 'my_order_screen';
  @override
  _MyOrdersScreenState createState() => _MyOrdersScreenState();
}

class _MyOrdersScreenState extends State<MyOrdersScreen> {
  int tag = 0;
  List<String> options = [
    'All Orders',
    'Ordered',
    'Accepted',
    'Picked Up',
    'On the way',
    'Delivered',
  ];

  OrderServices _orderServices = OrderServices();
  User user = FirebaseAuth.instance.currentUser;

  @override
  Widget build(BuildContext context) {
    var _orderProvider = Provider.of<OrderProvider>(context);

    return Scaffold(
      backgroundColor: Colors.grey.shade300,
      appBar: AppBar(
        centerTitle: true,
        title: Text('My Orders'),
        actions: [
          IconButton(icon: Icon(CupertinoIcons.search), onPressed: () {})
        ],
      ),
      body: Column(
        children: [
          Container(
            height: 56,
            width: MediaQuery.of(context).size.width,
            child: ChipsChoice<int>.single(
              choiceStyle: C2ChoiceStyle(
                  borderRadius: BorderRadius.all(Radius.circular(4))),
              value: tag,
              onChanged: (val) {
                if (val == 0) {
                  setState(() {
                    _orderProvider.status = null;
                  });
                }
                setState(() {
                  tag = val;
                  _orderProvider.filterOrder(options[val]);
                });
              },
              choiceItems: C2Choice.listFrom<int, String>(
                source: options,
                value: (i, v) => i,
                label: (i, v) => v,
              ),
            ),
          ),
          Container(
            child: StreamBuilder<QuerySnapshot>(
              stream: _orderServices.orders
                  .where('userId', isEqualTo: user.uid)
                  .where('orderStatus',
                      isEqualTo: tag > 0 ? _orderProvider.status : null)
                  .snapshots(),
              builder: (BuildContext context,
                  AsyncSnapshot<QuerySnapshot> snapshot) {
                if (snapshot.hasError) {
                  return Text('Something went wrong');
                }

                if (snapshot.connectionState == ConnectionState.waiting) {
                  return Center(
                    child: CircularProgressIndicator(),
                  );
                }
                if (snapshot.data.size == 0) {
                  return Center(
                    child: Text(tag > 0
                        ? 'No ${options[tag]} , Continue Shopping'
                        : 'No orders, Continue Shopping'),
                  );
                }

                return Expanded(
                  child: ListView(
                    children:
                        snapshot.data.docs.map((DocumentSnapshot document) {
                      Map<String, dynamic> data =
                          document.data() as Map<String, dynamic>;
                      return new Container(
                        color: Colors.white,
                        child: Column(
                          children: [
                            ListTile(
                              horizontalTitleGap: 0,
                              leading: CircleAvatar(
                                backgroundColor: Colors.white,
                                radius: 15,
                                child: _orderServices.statusIcon(document),
                              ),
                              title: Text(
                                document['orderStatus'],
                                style: TextStyle(
                                    fontSize: 12,
                                    color: _orderServices.statusColor(document),
                                    fontWeight: FontWeight.bold),
                              ),
                              subtitle: Text(
                                'On ${DateFormat.yMMMd().format(
                                  DateTime.parse(document['timeStamp']),
                                )}',
                                style: TextStyle(fontSize: 12),
                              ),
                              trailing: Column(
                                crossAxisAlignment: CrossAxisAlignment.end,
                                mainAxisSize: MainAxisSize.min,
                                children: [
                                  Text(
                                    'Payment Type :  ${document['cod'] == true ? 'Cash on Delivery' : 'Online Payment'}',
                                    style: TextStyle(
                                        fontSize: 12,
                                        fontWeight: FontWeight.bold),
                                  ),
                                  SizedBox(height: 5),
                                  Text(
                                    'Amount :  ₹${document['total'].toStringAsFixed(0)}',
                                    style: TextStyle(
                                        fontSize: 12,
                                        fontWeight: FontWeight.bold),
                                  ),
                                ],
                              ),
                            ),
                            //TODO: delivery boy contact, Live location,delivery boy name

                            if (document['deliveryBoy']['name'].length > 2)
                              Padding(
                                padding:
                                    const EdgeInsets.only(left: 10, right: 10),
                                child: ClipRRect(
                                  borderRadius: BorderRadius.circular(6),
                                  child: ListTile(
                                    tileColor:
                                        Colors.blueAccent.withOpacity(.2),
                                    leading: CircleAvatar(
                                      backgroundColor: Colors.white,
                                      child: Image.network(
                                        document['deliveryBoy']['image'],
                                        height: 54,
                                      ),
                                    ),
                                    title: Text(
                                      document['deliveryBoy']['name'],
                                      style: TextStyle(fontSize: 14),
                                    ),
                                    subtitle: Text(
                                      _orderServices.statusComment(document),
                                      style: TextStyle(fontSize: 12),
                                    ),
                                  ),
                                ),
                              ),
                            ExpansionTile(
                              title: Text(
                                'Order Details',
                                style: TextStyle(fontSize: 10),
                              ),
                              subtitle: Text(
                                'View Order Details',
                                style:
                                    TextStyle(fontSize: 12, color: Colors.grey),
                              ),
                              children: [
                                ListView.builder(
                                  shrinkWrap: true,
                                  physics: NeverScrollableScrollPhysics(),
                                  itemBuilder:
                                      (BuildContext context, int index) {
                                    return ListTile(
                                      leading: CircleAvatar(
                                        radius: 20,
                                        backgroundColor: Colors.white,
                                        child: Image.network(
                                            document['products'][index]
                                                ['productImage']),
                                      ),
                                      title: Text(
                                        document['products'][index]
                                            ['productName'],
                                        style: TextStyle(fontSize: 12),
                                      ),
                                      subtitle: Text(
                                        '${document['products'][index]['qty']} x ₹${document['products'][index]['price'].toStringAsFixed(0)}  =  ₹ ${document['products'][index]['total'].toStringAsFixed(0)}',
                                        style: TextStyle(
                                            color: Colors.grey, fontSize: 12),
                                      ),
                                    );
                                  },
                                  itemCount: document['products'].length,
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
                                                    fontSize: 12,
                                                    fontWeight:
                                                        FontWeight.bold),
                                              ),
                                              Text(
                                                ' ${document['seller']['shopName']}',
                                                style: TextStyle(
                                                    color: Colors.grey,
                                                    fontSize: 12),
                                              )
                                            ],
                                          ),
                                          SizedBox(height: 10),
                                          int.parse(document['discount']) > 0
                                              ? Container(
                                                  child: Column(
                                                    children: [
                                                      Row(
                                                        children: [
                                                          Text(
                                                            'Discount:',
                                                            style: TextStyle(
                                                                fontSize: 12,
                                                                fontWeight:
                                                                    FontWeight
                                                                        .bold),
                                                          ),
                                                          Text(
                                                            ' ${document['discount']}',
                                                            style: TextStyle(
                                                                color:
                                                                    Colors.grey,
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
                                                                fontWeight:
                                                                    FontWeight
                                                                        .bold),
                                                          ),
                                                          Text(
                                                            ' ${document['discountCode']}',
                                                            style: TextStyle(
                                                                color:
                                                                    Colors.grey,
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
                                                    fontSize: 12,
                                                    fontWeight:
                                                        FontWeight.bold),
                                              ),
                                              Text(
                                                '₹ ${document['deliveryFee']}',
                                                style: TextStyle(
                                                    color: Colors.grey,
                                                    fontSize: 12),
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
                            Divider(
                              color: Colors.grey.shade300,
                              thickness: 2,
                            ),
                          ],
                        ),
                      );
                    }).toList(),
                  ),
                );
              },
            ),
          ),
        ],
      ),
    );
  }
}
