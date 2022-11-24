import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:expandable_text/expandable_text.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/widgets/products/add_to_cart_widget.dart';
import 'package:flutter_shukran/widgets/products/bottom_sheet_container.dart';

class FavouriteDetailScreen extends StatelessWidget {
  static const String id = 'favourite_detail_screen';
  final DocumentSnapshot document;
  FavouriteDetailScreen({this.document});

  @override
  Widget build(BuildContext context) {
    var offer =
        ((document['product']['comparedPrice'] - document['product']['price']) /
                document['product']['comparedPrice'] *
                100)
            .toStringAsFixed(0);
    return Scaffold(
      appBar: AppBar(
        elevation: 10,
        backgroundColor: Colors.blueAccent,
        iconTheme: IconThemeData(color: Colors.white),
        actions: [
          IconButton(icon: Icon(CupertinoIcons.search), onPressed: () {}),
        ],
      ),
      body: Padding(
        padding: EdgeInsets.all(10.0),
        child: ListView(
          children: [
            Row(
              children: [
                Container(
                  decoration: BoxDecoration(
                    color: Colors.blueAccent.withOpacity(.3),
                    border: Border.all(color: Colors.blueAccent),
                  ),
                  child: Padding(
                    padding: const EdgeInsets.only(
                        left: 8, right: 8, top: 2, bottom: 2),
                    child: Text(document['product']['brand']),
                  ),
                ),
              ],
            ),
            SizedBox(height: 10),
            Text(
              document['product']['productName'],
              style: TextStyle(fontSize: 22),
            ),
            SizedBox(height: 10),
            Row(
              children: [
                Text(
                  '${document['product']['comparedPrice']}₹',
                  style: TextStyle(
                      decoration: TextDecoration.lineThrough,
                      color: Colors.red,
                      fontSize: 15),
                ),
                SizedBox(width: 10),
                Text(
                  '${document['product']['price']}₹',
                  style: TextStyle(fontSize: 15, fontWeight: FontWeight.bold),
                ),
                SizedBox(width: 10),
                // if offer available
                Container(
                  decoration: BoxDecoration(
                    color: Colors.blueAccent,
                    borderRadius: BorderRadius.only(
                      topLeft: Radius.circular(6),
                      bottomRight: Radius.circular(6),
                    ),
                  ),
                  child: Padding(
                    padding: const EdgeInsets.only(
                        left: 10, right: 10, top: 3, bottom: 3),
                    child: Text(
                      '$offer %OFF',
                      style: TextStyle(color: Colors.white, fontSize: 12),
                    ),
                  ),
                )
              ],
            ),
            SizedBox(height: 15),
            Padding(
              padding: const EdgeInsets.all(20.0),
              child: Hero(
                tag: 'product${document['product']['productName']}',
                child: Image.network(
                  document['product']['productImage'],
                  height: 200,
                  width: 200,
                ),
              ),
            ),
            Divider(
              thickness: 6,
              color: Colors.grey.shade300,
            ),
            Container(
              child: Padding(
                padding: const EdgeInsets.only(top: 8, bottom: 8),
                child: Text(
                  'About this Product',
                  style: TextStyle(fontSize: 20),
                ),
              ),
            ),
            Divider(
              color: Colors.grey.shade300,
            ),
            Padding(
              padding: const EdgeInsets.only(top: 8, bottom: 8),
              child: ExpandableText(
                document['product']['description'],
                expandText: 'View more',
                collapseText: 'View less',
                maxLines: 2,
                style: TextStyle(color: Colors.grey),
              ),
            ),
            Divider(
              color: Colors.grey.shade400,
            ),
            Container(
              child: Padding(
                padding: const EdgeInsets.only(top: 8, bottom: 8),
                child: Text(
                  'Other product info',
                  style: TextStyle(fontSize: 20),
                ),
              ),
            ),
            Divider(
              color: Colors.grey.shade400,
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  'SKU : ${document['product']['sku']}',
                  style: TextStyle(color: Colors.grey),
                ),
                Text(
                  'Seller :  ${document['product']['seller']['shopName']}',
                  style: TextStyle(color: Colors.grey),
                ),
              ],
            ),
            SizedBox(
              height: 80,
            ),
          ],
        ),
      ),
    );
  }
}
