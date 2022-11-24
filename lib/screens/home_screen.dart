import 'package:chips_choice/chips_choice.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:shukrann_delivery_boy/screens/login_screen.dart';
import 'package:shukrann_delivery_boy/services/firebase_services.dart';
import 'package:shukrann_delivery_boy/widgets/order_summary_card.dart';

class HomeScreen extends StatefulWidget {
  static const String id = 'home_screen';

  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  int tag = 0;
  List<String> options = [
    'All ',
    'Accepted',
    'Ordered',
    'Picked Up',
    'On the way',
    'Delivered',
  ];
  User _user = FirebaseAuth.instance.currentUser;
  FirebaseServices _services = FirebaseServices();
  String status;
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.blueAccent,
        centerTitle: true,
        title: Text('Orders'),
      ),
      backgroundColor: Colors.blueAccent.withOpacity(.2),
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
                    status = null;
                  });
                }
                setState(() {
                  tag = val;
                  status = options[val];
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
              stream: _services.orders
                  .where('deliveryBoy.email', isEqualTo: _user.email)
                  .where('orderStatus', isEqualTo: tag == 0 ? null : status)
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
                  return Center(child: Text('No $status Orders'));
                }

                return Expanded(
                  child: ListView(
                    children:
                        snapshot.data.docs.map((DocumentSnapshot document) {
                      Map<String, dynamic> data =
                          document.data() as Map<String, dynamic>;
                      return Padding(
                        padding: const EdgeInsets.only(
                            left: 10, right: 10, bottom: 10),
                        child: OrderSummaryCard(document),
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
