import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/store_providers.dart';
import 'package:flutter_shukran/screens/product_details_screen.dart';
import 'package:flutter_shukran/services/product_service.dart';
import 'package:flutter_shukran/widgets/cart/counter.dart';
import 'package:flutter_shukran/widgets/favourite/favourite_card_widget.dart';
import 'package:flutter_shukran/widgets/products/product_card_widget.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';
import 'package:provider/provider.dart';

class FavouriteListWidget extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    ProductServices _services = ProductServices();
    var _storeProvider = Provider.of<StoreProvider>(context);
    return StreamBuilder<QuerySnapshot>(
      stream: _services.favourites
          .where('customerId', isEqualTo: _storeProvider.user.uid)
          .snapshots(),
      builder: (BuildContext context, AsyncSnapshot<QuerySnapshot> snapshot) {
        if (snapshot.hasError) {
          return Text('Something went wrong');
        }
        if (!snapshot.hasData) {
          return Container();
        }

        if (snapshot.data.docs.isEmpty) {
          return Center(
            child: Text(
              'There Are No Favourites',
              style: TextStyle(fontSize: 18),
            ),
          );
        }

        return ListView(
          shrinkWrap: true,
          physics: NeverScrollableScrollPhysics(),
          children: snapshot.data.docs.map((DocumentSnapshot document) {
            Map<String, dynamic> data = document.data() as Map<String, dynamic>;
            return FavouriteCard(document);
          }).toList(),
        );
      },
    );
  }
}
