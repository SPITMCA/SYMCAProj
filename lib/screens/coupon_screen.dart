import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:shukran_vendor/screens/add_edit_coupon_screen.dart';
import 'package:shukran_vendor/services/firebase_services.dart';
import 'package:intl/intl.dart';

class CouponScreen extends StatelessWidget {
  static const String id = 'coupon_screen';
  @override
  Widget build(BuildContext context) {
    FireBaseServices _services = FireBaseServices();
    return Scaffold(
      body: Container(
        child: StreamBuilder(
          stream: _services.coupons
              .where('sellerId', isEqualTo: _services.user.uid)
              .snapshots(),
          builder: (context, snapshot) {
            if (snapshot.hasError) {
              return Text('Something went wrong');
            }

            if (snapshot.connectionState == ConnectionState.waiting) {
              return Center(
                child: CircularProgressIndicator(),
              );
            }

            if (!snapshot.hasData) {
              return Center(
                child: Text('No Coupons Added yet'),
              );
            }

            return Column(
              children: [
                Row(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: [
                    Padding(
                      padding: const EdgeInsets.all(8.0),
                      child: FlatButton(
                        color: Colors.blueAccent,
                        onPressed: () {
                          Navigator.pushNamed(context, AddEditCoupon.id);
                        },
                        child: Text(
                          'Add New Coupon',
                          style: TextStyle(color: Colors.white),
                        ),
                      ),
                    ),
                  ],
                ),
                FittedBox(
                  child: DataTable(columns: <DataColumn>[
                    DataColumn(label: Text('Title')),
                    DataColumn(label: Text('Rate')),
                    DataColumn(label: Text('Status')),
                    DataColumn(label: Text('Expiry')),
                    DataColumn(label: Text('Info')),
                  ], rows: _couponList(snapshot.data, context)),
                )
              ],
            );
          },
        ),
      ),
    );
  }

  List<DataRow> _couponList(QuerySnapshot snapshot, context) {
    List<DataRow> newList = snapshot.docs.map((DocumentSnapshot document) {
      if (document != null) {
        var date = document['expiry'];
        var expiry = DateFormat.yMMMd().add_jm().format(date.toDate());
        return DataRow(cells: [
          DataCell(Text(document['title'])),
          DataCell(Text(document['discountRate'].toString())),
          DataCell(Text(document['active'] ? 'Active' : 'Inactive')),
          DataCell(Text(expiry.toString())),
          DataCell(
            IconButton(
              icon: Icon(Icons.info_outline),
              onPressed: () {
                Navigator.push(
                    context,
                    MaterialPageRoute(
                        builder: (context) => AddEditCoupon(
                              document: document,
                            )));
              },
            ),
          ),
        ]);
      }
    }).toList();
    return newList;
  }
}
