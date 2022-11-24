import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/models/vendor_model.dart';
import 'package:flutter_shukran/providers/location_provider.dart';
import 'package:flutter_shukran/screens/home_screen.dart';
import 'package:flutter_shukran/screens/map_screen.dart';
import 'package:flutter_shukran/screens/vendor_home_screen.dart';
import 'package:flutter_shukran/screens/welcome_screen.dart';
import 'package:flutter_shukran/widgets/search_card.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';
import 'package:provider/provider.dart';
import 'package:search_page/search_page.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../constants.dart';

class MyAppBar extends StatefulWidget {
  @override
  _MyAppBarState createState() => _MyAppBarState();
}

class _MyAppBarState extends State<MyAppBar> {
  static List<Vendor> vendors = [];
  String _location = "";
  String _address = "";
  DocumentSnapshot document;
  Vendor vendor;

  @override
  void initState() {
    getPrefs();
    FirebaseFirestore.instance
        .collection('vendors')
        .get()
        .then((QuerySnapshot querySnapshot) {
      querySnapshot.docs.forEach((doc) {
        setState(() {
          document = doc;
          vendors.add(Vendor(
            shopName: doc['shopName'],
            document: doc,
          ));
        });
      });
    });
    super.initState();
  }

  getPrefs() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    String location = prefs.getString('location');
    String address = prefs.getString('address');
    setState(() {
      _location = location;
      _address = address;
    });
  }

  @override
  Widget build(BuildContext context) {
    final locationData = Provider.of<LocationProvider>(context);
    return SliverAppBar(
      automaticallyImplyLeading: false,
      elevation: 0.0,
      floating: true,
      snap: true,
      title: FlatButton(
        onPressed: () {
          locationData.getCurrentPosition().then((value) {
            if (value != null) {
              pushNewScreenWithRouteSettings(
                context,
                settings: RouteSettings(name: MapScreen.id),
                screen: MapScreen(),
                withNavBar: false,
                pageTransitionAnimation: PageTransitionAnimation.cupertino,
              );
            } else {
              print('Permission not Allowed');
            }
          });
        },
        child: Column(
          mainAxisSize: MainAxisSize.min,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Row(
              children: [
                Flexible(
                  child: Text(
                    _location == null ? 'Address not Set' : _location,
                    style: TextStyle(color: Colors.white),
                    overflow: TextOverflow.ellipsis,
                  ),
                ),
                SizedBox(
                  width: 10.0,
                ),
                Icon(
                  Icons.edit_outlined,
                  color: Colors.white54,
                  size: 15,
                ),
              ],
            ),
            Flexible(
              child: Text(
                _address == null
                    ? 'Press Here To Set the Delivery Address'
                    : _address,
                overflow: TextOverflow.ellipsis,
                style:
                    TextStyle(color: Colors.white, fontWeight: FontWeight.bold),
              ),
            ),
          ],
        ),
      ),
      actions: [
        // IconButton(
        //   icon: Icon(Icons.logout),
        //   onPressed: () {
        //     FirebaseAuth.instance.signOut();
        //     Navigator.pushReplacementNamed(context, WelcomeScreen.id);
        //   },
        // ),
        // IconButton(
        //   icon: Icon(Icons.account_circle_outlined),
        //   onPressed: () {},
        // )
      ],
      // bottom: PreferredSize(
      //   preferredSize: Size.fromHeight(56.0),
      //   child: Padding(
      //     padding: const EdgeInsets.all(10.0),
      //     child: InkWell(
      //       onTap: () {
      //         showSearch(
      //           context: context,
      //           delegate: SearchPage<Vendor>(
      //               onQueryUpdate: (s) => print(s),
      //               items: vendors,
      //               searchLabel: 'Search Products',
      //               suggestion: Center(
      //                 child: Text('Filter Product by name, category or price'),
      //               ),
      //               failure: Center(
      //                 child: Text('No product found :('),
      //               ),
      //               filter: (product) => [
      //                     product.shopName,
      //                   ],
      //               builder: (product) => product.shopName != product.shopName
      //                   ? Container()
      //                   : Container(
      //                       child: Row(
      //                         children: [
      //                           ClipRRect(
      //                             borderRadius: BorderRadius.circular(4),
      //                             child: Image.network(
      //                                 vendor.document['imageUrl']),
      //                           ),
      //                           Text(vendor.document['shopName']),
      //                         ],
      //                       ),
      //                     )),
      //         );
      //       },
      //       child: TextField(
      //         decoration: InputDecoration(
      //           prefixIcon: Icon(
      //             Icons.search,
      //             color: Colors.grey,
      //           ),
      //           hintText: 'Search',
      //           border: OutlineInputBorder(
      //             borderRadius: BorderRadius.circular(5),
      //             borderSide: BorderSide.none,
      //           ),
      //           contentPadding: EdgeInsets.zero,
      //           filled: true,
      //           fillColor: Colors.white,
      //         ),
      //       ),
      //     ),
      //   ),
      // ),
    );
  }
}
