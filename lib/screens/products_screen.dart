import 'package:flutter/material.dart';
import 'package:shukran_vendor/screens/add_new_product_screen.dart';
import 'package:shukran_vendor/widgets/published_product.dart';
import 'package:shukran_vendor/widgets/unpublished_product.dart';

class ProductScreen extends StatelessWidget {
  static const String id = 'product_screen';

  @override
  Widget build(BuildContext context) {
    return DefaultTabController(
      length: 2,
      child: Scaffold(
        body: Column(
          children: [
            Material(
              elevation: 3,
              child: Padding(
                padding: const EdgeInsets.all(10.0),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Container(
                      child: Row(
                        children: [
                          Text(
                            'Products',
                          ),
                          SizedBox(width: 10),
                        ],
                      ),
                    ),
                    FlatButton.icon(
                        color: Colors.blueAccent,
                        onPressed: () {
                          Navigator.pushReplacementNamed(
                              context, AddNewProduct.id);
                        },
                        icon: Icon(
                          Icons.add,
                          color: Colors.white,
                        ),
                        label: Text(
                          'Add New',
                          style: TextStyle(color: Colors.white),
                        ))
                  ],
                ),
              ),
            ),
            TabBar(
              labelColor: Colors.blueAccent,
              unselectedLabelColor: Colors.black54,
              labelStyle: TextStyle(fontWeight: FontWeight.bold),
              indicatorColor: Colors.blueAccent,
              tabs: [
                Tab(text: 'Published'),
                Tab(text: 'Unpublished'),
              ],
            ),
            Expanded(
              child: Container(
                child: TabBarView(
                  children: [
                    PublishedProduct(),
                    UnPublishedProduct(),
                  ],
                ),
              ),
            )
          ],
        ),
      ),
    );
  }
}
