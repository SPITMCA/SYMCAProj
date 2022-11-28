import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/store_providers.dart';
import 'package:flutter_shukran/widgets/favourite/favourite_list_widget.dart';
import 'package:flutter_shukran/widgets/products/product_fliter_widget.dart';
import 'package:flutter_shukran/widgets/products/product_list_widget.dart';
import 'package:provider/provider.dart';

class FavouriteScreen extends StatelessWidget {
  static const String id = 'product_fav_screen';
  @override
  Widget build(BuildContext context) {
    var _storeProvider = Provider.of<StoreProvider>(context);
    return Scaffold(
      appBar: AppBar(
        centerTitle: true,
        title: Text('Favourites'),
      ),
      body: ListView(
        padding: EdgeInsets.zero,
        shrinkWrap: true,
        physics: NeverScrollableScrollPhysics(),
        children: [
          FavouriteListWidget(),
        ],
      ),
    );
  }
}
