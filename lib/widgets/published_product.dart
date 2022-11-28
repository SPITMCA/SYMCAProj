import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:shukran_vendor/screens/edit_view_product.dart';
import 'package:shukran_vendor/services/firebase_services.dart';

class PublishedProduct extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    FireBaseServices _services = FireBaseServices();
    return Container(
      child: StreamBuilder(
        stream:
            _services.products.where('published', isEqualTo: true).snapshots(),
        builder: (context, snapshot) {
          if (snapshot.hasError) {
            return Center(child: Text('Something Went Wrong'));
          }
          if (snapshot.connectionState == ConnectionState.waiting) {
            return Center(child: CircularProgressIndicator());
          }
          return SingleChildScrollView(
            child: FittedBox(
              child: DataTable(
                showBottomBorder: true,
                dataRowHeight: 80,
                headingRowColor:
                    MaterialStateProperty.all(Colors.grey.shade200),
                columns: <DataColumn>[
                  DataColumn(label: Expanded(child: Text('Product'))),
                  DataColumn(label: Text('Image')),
                  DataColumn(label: Text('Info')),
                  DataColumn(label: Text('Actions')),
                ],
                rows: _productDetails(snapshot.data, context),
              ),
            ),
          );
        },
      ),
    );
  }

  List<DataRow> _productDetails(QuerySnapshot snapshot, context) {
    List<DataRow> newList = snapshot.docs.map((DocumentSnapshot document) {
      if (document != null) {
        return DataRow(cells: [
          DataCell(
            Container(
              child: ListTile(
                contentPadding: EdgeInsets.zero,
                title: Row(
                  children: [
                    Expanded(
                      child: Text(
                        document['productName'],
                        style: TextStyle(fontSize: 15),
                      ),
                    ),
                    SizedBox(height: 5)
                  ],
                ),
                subtitle: Row(
                  children: [
                    Expanded(
                      child: Text(
                        'SKU:',
                        style: TextStyle(
                            fontSize: 12, fontWeight: FontWeight.bold),
                      ),
                    ),
                    Expanded(
                      child: Text(
                        document['sku'],
                        style: TextStyle(fontSize: 12),
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ),
          DataCell(
            Container(
              child: Padding(
                padding: const EdgeInsets.all(8.0),
                child: Row(
                  children: [
                    Image.network(
                      document['productImage'],
                      width: 50,
                    ),
                  ],
                ),
              ),
            ),
          ),
          DataCell(IconButton(
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => EditViewProduct(
                    productId: document['productId'],
                  ),
                ),
              );
            },
            icon: Icon(Icons.info_outline),
          )),
          DataCell(popUpButton(document.data()))
        ]);
      }
    }).toList();
    return newList;
  }

  Widget popUpButton(data, {BuildContext context}) {
    FireBaseServices _services = FireBaseServices();
    return PopupMenuButton<String>(
        onSelected: (String value) {
          if (value == 'unpublish') {
            _services.unPublishProduct(id: data['productId']);
          }
        },
        itemBuilder: (BuildContext context) => <PopupMenuEntry<String>>[
              const PopupMenuItem<String>(
                value: 'unpublish',
                child: ListTile(
                  leading: Icon(Icons.check),
                  title: Text('Un Publish'),
                ),
              ),
              const PopupMenuItem<String>(
                value: 'preview',
                child: ListTile(
                  leading: Icon(Icons.info_outline),
                  title: Text('Preview'),
                ),
              ),
            ]);
  }
}
