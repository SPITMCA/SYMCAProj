import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';

import 'package:flutter_shukran/widgets/cart/counter.dart';

class CartCard extends StatelessWidget {
  final DocumentSnapshot document;
  CartCard({this.document});
  @override
  Widget build(BuildContext context) {
    double saving = document['comparedPrice'] - document['price'];

    return Container(
      height: 120,
      decoration: BoxDecoration(
          border: Border(
            bottom: BorderSide(color: Colors.grey.shade300),
          ),
          color: Colors.white),
      child: Padding(
        padding: const EdgeInsets.all(8.0),
        child: Stack(
          children: [
            Row(
              children: [
                Container(
                  height: 120,
                  width: 120,
                  child: Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Image.network(
                      document['productImage'],
                      fit: BoxFit.contain,
                    ),
                  ),
                ),
                Container(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        document['productName'],
                        style: TextStyle(fontSize: 13),
                      ),
                      SizedBox(
                        height: 10,
                      ),
                      if (document['comparedPrice'] > 0)
                        Text(
                          '₹${document['comparedPrice'].toString()}',
                          style: TextStyle(
                              decoration: TextDecoration.lineThrough,
                              color: Colors.red),
                        ),
                      SizedBox(height: 8),
                      Text('₹${document['price'].toString()}'),
                    ],
                  ),
                )
              ],
            ),
            Positioned(
              bottom: 0,
              right: 0,
              child: CounterForCard(document),
            ),
            if (saving > 0)
              Positioned(
                child: CircleAvatar(
                  backgroundColor: Colors.blueAccent,
                  child: FittedBox(
                    child: Padding(
                      padding: const EdgeInsets.all(8.0),
                      child: Column(
                        children: [
                          Text(
                            '₹${saving.toString()}',
                            style: TextStyle(color: Colors.white),
                          ),
                          Text('SAVED')
                        ],
                      ),
                    ),
                  ),
                ),
              )
          ],
        ),
      ),
    );
  }
}
