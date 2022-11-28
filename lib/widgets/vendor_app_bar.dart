import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/models/product_model.dart';
import 'package:flutter_shukran/providers/store_providers.dart';
import 'package:flutter_shukran/screens/product_details_screen.dart';
import 'package:flutter_shukran/widgets/search_card.dart';
import 'package:map_launcher/map_launcher.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';
import 'package:provider/provider.dart';
import 'package:search_page/search_page.dart';
import 'package:url_launcher/url_launcher.dart';

import 'cart/counter.dart';

class VendorAppBar extends StatefulWidget {
  @override
  _VendorAppBarState createState() => _VendorAppBarState();
}

class _VendorAppBarState extends State<VendorAppBar> {
  static List<Product> products = [];
  String offer;
  String shopName;
  DocumentSnapshot document;

  @override
  void initState() {
    FirebaseFirestore.instance
        .collection('products')
        .get()
        .then((QuerySnapshot querySnapshot) {
      querySnapshot.docs.forEach((doc) {
        setState(() {
          document = doc;
          offer = ((doc['comparedPrice'] - doc['price']) /
                  doc['comparedPrice'] *
                  100)
              .toStringAsFixed(0);
          products.add(Product(
            brand: doc['brand'],
            comparedPrice: doc['comparedPrice'],
            price: doc['price'],
            category: doc['categoryName']['mainCategory'],
            image: doc['productImage'],
            productName: doc['productName'],
            shopName: doc['seller']['shopName'],
            document: doc,
          ));
        });
      });
    });
    super.initState();
  }

  @override
  void dispose() {
    products.clear();
    // TODO: implement dispose
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    var _store = Provider.of<StoreProvider>(context);

    mapLauncher() async {
      GeoPoint location = _store.storeDetails['location'];
      final availableMaps = await MapLauncher.installedMaps;
      // [AvailableMap { mapName: Google Maps, mapType: google }, ...]

      await availableMaps.first.showMarker(
        coords: Coords(location.latitude, location.longitude),
        title: "${_store.storeDetails['shopName']} is here",
      );
    }

    return SliverAppBar(
      expandedHeight: 280,
      flexibleSpace: SizedBox(
        child: Padding(
          padding: const EdgeInsets.only(top: 86),
          child: Card(
            child: Padding(
              padding: const EdgeInsets.all(10.0),
              child: Container(
                width: MediaQuery.of(context).size.width,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(5),
                  image: DecorationImage(
                    fit: BoxFit.cover,
                    image: NetworkImage(
                      _store.storeDetails['imageUrl'],
                    ),
                  ),
                ),
                child: Container(
                  color: Colors.grey.withOpacity(.7),
                  child: Padding(
                    padding: const EdgeInsets.all(10.0),
                    child: ListView(
                      padding: EdgeInsets.zero,
                      children: [
                        Row(
                          children: [
                            CircleAvatar(
                              backgroundImage:
                                  NetworkImage(_store.storeDetails['imageUrl']),
                              backgroundColor: Colors.transparent,
                              radius: 30,
                            ),
                          ],
                        ),
                        Text(
                          _store.storeDetails['dialog'],
                          style: TextStyle(
                              color: Colors.white,
                              fontWeight: FontWeight.bold,
                              fontSize: 15),
                        ),
                        // Text(
                        //   _store.storeDetails['address'],
                        //   style: TextStyle(color: Colors.white),
                        // ),
                        // Text(
                        //   _store.storeDetails['email'],
                        //   style: TextStyle(color: Colors.white),
                        // ),
                        // Text(
                        //   'Distance : ${_store.distance}km',
                        //   style: TextStyle(color: Colors.white),
                        // ),
                        SizedBox(height: 6),
                        Row(
                          children: [
                            Icon(Icons.star, color: Colors.white),
                            Icon(Icons.star, color: Colors.white),
                            Icon(Icons.star, color: Colors.white),
                            Icon(Icons.star_half, color: Colors.white),
                            Icon(Icons.star_border, color: Colors.white),
                            SizedBox(width: 5),
                            Text(
                              '(3.5)',
                              style: TextStyle(color: Colors.white),
                            )
                          ],
                        ),
                        // Row(
                        //   mainAxisAlignment: MainAxisAlignment.end,
                        //   children: [
                        //     CircleAvatar(
                        //       backgroundColor: Colors.white,
                        //       child: IconButton(
                        //         onPressed: () {
                        //           launch(
                        //               'tel:${_store.storeDetails['mobile']}');
                        //         },
                        //         icon:
                        //             Icon(Icons.phone, color: Colors.blueAccent),
                        //       ),
                        //     ),
                        //     SizedBox(width: 3),
                        //     CircleAvatar(
                        //       backgroundColor: Colors.white,
                        //       child: IconButton(
                        //         onPressed: () {
                        //           mapLauncher();
                        //         },
                        //         icon: Icon(Icons.map, color: Colors.blueAccent),
                        //       ),
                        //     ),
                        //   ],
                        // )
                      ],
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      floating: true,
      snap: true,
      iconTheme: IconThemeData(color: Colors.white),
      actions: [
        IconButton(
          icon: Icon(CupertinoIcons.search),
          onPressed: () {
            setState(() {
              shopName = _store.storeDetails['shopName'];
            });
            showSearch(
              context: context,
              delegate: SearchPage<Product>(
                onQueryUpdate: (s) => print(s),
                items: products,
                searchLabel: 'Search Products',
                suggestion: Center(
                  child: Text('Filter Product by name, category or price'),
                ),
                failure: Center(
                  child: Text('No product found :('),
                ),
                filter: (product) => [
                  product.brand,
                  product.price.toString(),
                  product.productName,
                  product.category,
                ],
                builder: (product) => product.shopName != product.shopName
                    ? Container()
                    : SearchCard(
                        offer: offer,
                        product: product,
                        document: document,
                      ),
              ),
            );
          },
        ),
      ],
      title: Text(
        _store.storeDetails['shopName'],
        style: TextStyle(fontWeight: FontWeight.bold),
      ),
    );
  }
}
