import 'package:flutter/material.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter_shukran/providers/store_providers.dart';
import 'package:flutter_shukran/services/product_service.dart';
import 'package:flutter_shukran/widgets/products/product_card_widget.dart';
import 'package:flutter_shukran/widgets/products/product_fliter_widget.dart';
import 'package:provider/provider.dart';

class ProductListWidget extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    ProductServices _services = ProductServices();
    var _storeProvider = Provider.of<StoreProvider>(context);

    return FutureBuilder<QuerySnapshot>(
      future: _services.products
          .where('published', isEqualTo: true)
          .where('categoryName.mainCategory',
              isEqualTo: _storeProvider.selectedProductCategory)
          .where('categoryName.subCategory',
              isEqualTo: _storeProvider.selectedSubCategory)
          .where('seller.sellerUid',
              isEqualTo: _storeProvider.storeDetails['uid'])
          .limit(10)
          .get(),
      builder: (BuildContext context, AsyncSnapshot<QuerySnapshot> snapshot) {
        if (snapshot.hasError) {
          return Text('Something went wrong');
        }
        if (!snapshot.hasData) {
          return Container();
        }
        if (snapshot.data.docs.isEmpty) {
          return Container(); // if not data
        }

        return Column(
          children: [
            Container(
              width: MediaQuery.of(context).size.width,
              height: 50,
              decoration: BoxDecoration(
                color: Colors.grey.shade300,
                borderRadius: BorderRadius.circular(4),
              ),
              child: Center(
                child: Padding(
                  padding: const EdgeInsets.only(left: 10),
                  child: Row(
                    children: [
                      Text(
                        '${_storeProvider.selectedProductCategory} : ',
                        style: TextStyle(fontWeight: FontWeight.bold),
                      ),
                      Text(
                        '${snapshot.data.docs.length} Items',
                        style: TextStyle(
                            fontWeight: FontWeight.bold,
                            color: Colors.grey.shade600),
                      ),
                    ],
                  ),
                ),
              ),
            ),
            ListView(
              physics: NeverScrollableScrollPhysics(),
              shrinkWrap: true,
              children: snapshot.data.docs.map((DocumentSnapshot document) {
                Map<String, dynamic> data =
                    document.data() as Map<String, dynamic>;
                return ProductCard(document);
              }).toList(),
            ),
          ],
        );
      },
    );
  }
}
