import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/auth_providers.dart';
import 'package:flutter_shukran/providers/location_provider.dart';
import 'package:flutter_shukran/screens/map_screen.dart';
import 'package:flutter_shukran/widgets/ad_slider.dart';
import 'package:flutter_shukran/widgets/near_by_store.dart';
import 'package:flutter_shukran/widgets/products/best_selling_procducts.dart';
import 'package:flutter_shukran/widgets/products/recently_added_products.dart';
import 'package:flutter_shukran/widgets/top_pick_store.dart';
import 'package:flutter_shukran/screens/welcome_screen.dart';
import 'package:flutter_shukran/widgets/image_slider.dart';
import 'package:flutter_shukran/widgets/my_app_bar.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

class HomeScreen extends StatefulWidget {
  static const String id = 'home-screen';

  const HomeScreen({Key key}) : super(key: key);

  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  @override
  Widget build(BuildContext context) {
    final auth = Provider.of<AuthProvider>(context);

    return Scaffold(
        backgroundColor: Colors.grey.shade300,
        body: NestedScrollView(
          headerSliverBuilder: (BuildContext context, bool innerBoxIsScrolled) {
            return [MyAppBar()];
          },
          body: ListView(
            padding: EdgeInsets.only(top: 0),
            children: [
              Container(
                color: Colors.white,
                child: ImageSlider(),
              ),
              Container(
                color: Colors.white,
                height: 200,
                child: TopPickStore(),
              ),
              Padding(
                padding: const EdgeInsets.only(top: 0),
                child: NearByStores(),
              ),
              // Container(
              //   color: Colors.white,
              //   child: AdSlider(),
              // ),
            ],
          ),
        ));
  }
}
