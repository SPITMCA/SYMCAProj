import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shukran_vendor/providers/product_provider.dart';

class MenuWidget extends StatefulWidget {
  final Function(String) onItemClick;

  const MenuWidget({Key key, this.onItemClick}) : super(key: key);

  @override
  _MenuWidgetState createState() => _MenuWidgetState();
}

class _MenuWidgetState extends State<MenuWidget> {
  User user = FirebaseAuth.instance.currentUser;
  var vendorData;

  @override
  void initState() {
    getVendorData();
    // TODO: implement initState
    super.initState();
  }

  Future<DocumentSnapshot> getVendorData() async {
    var result = await FirebaseFirestore.instance
        .collection('vendors')
        .doc(user.uid)
        .get();
    setState(() {
      vendorData = result;
    });
    return result;
  }

  @override
  Widget build(BuildContext context) {
    var _provider = Provider.of<ProductProvider>(context);
    // _provider.getShopName(vendorData != null ? vendorData['shopName'] : '');
    return Container(
      color: Colors.white,
      padding: const EdgeInsets.only(top: 30),
      child: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: <Widget>[
            SizedBox(
              height: 30,
            ),
            CircleAvatar(
              radius: 32,
              backgroundColor: Colors.grey,
              child: CircleAvatar(
                radius: 30,
                backgroundImage: vendorData != null
                    ? NetworkImage(vendorData['imageUrl'])
                    : null,
              ),
            ),
            SizedBox(
              height: 20,
            ),
            Text(
              //TODO: will deal with it later shop name changes.
              vendorData != null ? vendorData['shopName'] : 'Shop Name',
              style: TextStyle(
                color: Colors.black,
                fontWeight: FontWeight.bold,
                fontSize: 20,
              ),
            ),
            SizedBox(
              height: 20,
            ),
            sliderItem('Dashboard', Icons.dashboard_outlined),
            sliderItem('Products', Icons.shopping_bag_outlined),
            sliderItem('Banners', CupertinoIcons.photo),
            sliderItem('Coupons', CupertinoIcons.gift),
            sliderItem('Orders', Icons.list_alt_outlined),
            sliderItem('Product Banners', Icons.stacked_bar_chart),
            sliderItem('Setting', Icons.settings_outlined),
            sliderItem('LogOut', Icons.arrow_back_ios)
          ],
        ),
      ),
    );
  }

  Widget sliderItem(String title, IconData icons) => InkWell(
        child: Container(
          decoration: BoxDecoration(
            border: Border(
              bottom: BorderSide(color: Colors.grey),
            ),
          ),
          child: SizedBox(
            height: 50,
            child: Padding(
              padding: const EdgeInsets.only(left: 20),
              child: Row(
                children: [
                  Icon(
                    icons,
                    color: Colors.black,
                    size: 18,
                  ),
                  SizedBox(width: 10),
                  Text(
                    title,
                    style: TextStyle(color: Colors.black54),
                  )
                ],
              ),
            ),
          ),
        ),
        onTap: () {
          widget.onItemClick(title);
        },
      );
}
