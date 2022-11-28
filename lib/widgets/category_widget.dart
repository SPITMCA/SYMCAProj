import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/store_providers.dart';
import 'package:flutter_shukran/screens/product_list_screen.dart';
import 'package:flutter_shukran/widgets/products/product_list_widget.dart';
import 'package:flutter_shukran/services/product_service.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';
import 'package:provider/provider.dart';

class VendorsCategories extends StatefulWidget {
  @override
  _VendorsCategoriesState createState() => _VendorsCategoriesState();
}

class _VendorsCategoriesState extends State<VendorsCategories> {
  ProductServices _services = ProductServices();
  List _catList = [];

  @override
  void didChangeDependencies() {
    var _store = Provider.of<StoreProvider>(context);
    FirebaseFirestore.instance
        .collection('products')
        .where('seller.sellerUid', isEqualTo: _store.storeDetails['uid'])
        .get()
        .then((QuerySnapshot querySnapshot) {
      querySnapshot.docs.forEach((doc) {
        _catList.add(doc['categoryName']['mainCategory']);
      });
    });

    super.didChangeDependencies();
  }

  @override
  Widget build(BuildContext context) {
    var _storeProvider = Provider.of<StoreProvider>(context);
    return FutureBuilder(
        future: _services.category.get(),
        builder: (BuildContext context, AsyncSnapshot<QuerySnapshot> snapshot) {
          if (snapshot.hasError) {
            return Center(child: Text('Something Went Wrong'));
          }
          if (_catList.length == 0) {
            return Center(
              child: CircularProgressIndicator(),
            );
          }
          if (!snapshot.hasData) {
            return Container();
          }
          return SingleChildScrollView(
            child: Column(
              children: [
                Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Material(
                    elevation: 4,
                    borderRadius: BorderRadius.circular(6),
                    child: Container(
                      height: 60,
                      width: MediaQuery.of(context).size.width,
                      decoration: BoxDecoration(
                        color: Colors.white,
                        borderRadius: BorderRadius.circular(4),
                      ),
                      child: Center(
                        child: Text(
                          'Shop by Category',
                          style: TextStyle(
                              shadows: <Shadow>[
                                Shadow(
                                    offset: Offset(2.0, 2.0),
                                    blurRadius: 3,
                                    color: Colors.white),
                              ],
                              color: Colors.black,
                              fontSize: 25,
                              fontWeight: FontWeight.bold),
                        ),
                      ),
                    ),
                  ),
                ),
                Wrap(
                  direction: Axis.horizontal,
                  children: snapshot.data.docs.map((DocumentSnapshot document) {
                    return _catList.contains(document['name'])
                        ? InkWell(
                            onTap: () {
                              _storeProvider.selectedCategory(document['name']);
                              _storeProvider.selectedCategorySub(null);
                              pushNewScreenWithRouteSettings(
                                context,
                                settings:
                                    RouteSettings(name: ProductListScreen.id),
                                screen: ProductListScreen(),
                                withNavBar: true,
                                pageTransitionAnimation:
                                    PageTransitionAnimation.cupertino,
                              );
                            },
                            child: Container(
                              width: 120,
                              height: 120,
                              decoration: BoxDecoration(
                                borderRadius: BorderRadius.circular(10),
                              ),
                              child: Container(
                                padding: EdgeInsets.all(5),
                                decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(10),
                                  color: Colors.white,
                                  // border: Border.all(
                                  //   color: Colors.grey,
                                  //   width: .5,
                                  // ),
                                ),
                                child: Material(
                                  elevation: 10,
                                  shadowColor: Colors.black,
                                  borderRadius: BorderRadius.circular(10),
                                  child: Column(
                                    children: [
                                      Expanded(
                                        child: Center(
                                          child:
                                              Image.network(document['image']),
                                        ),
                                      ),
                                      Padding(
                                        padding: const EdgeInsets.only(
                                            left: 8, right: 8, bottom: 8),
                                        child: Text(
                                          document['name'],
                                          textAlign: TextAlign.center,
                                        ),
                                      )
                                    ],
                                  ),
                                ),
                              ),
                            ),
                          )
                        : Text('');
                  }).toList(),
                ),
              ],
            ),
          );
        });
  }
}
