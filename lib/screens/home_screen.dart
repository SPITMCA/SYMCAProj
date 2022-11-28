import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:flutter_slider_drawer/flutter_slider_drawer.dart';
import 'package:shukran_vendor/screens/dashboard_screen.dart';
import 'package:shukran_vendor/screens/login_screen.dart';
import 'package:shukran_vendor/screens/register_screen.dart';
import 'package:shukran_vendor/services/drawer_services.dart';
import 'package:shukran_vendor/widgets/drawer_menu_widget.dart';

class HomeScreen extends StatefulWidget {
  static const String id = 'home_screen';

  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  DrawerServices _drawerServices = DrawerServices();
  GlobalKey<SliderMenuContainerState> _key =
      new GlobalKey<SliderMenuContainerState>();
  String title;

  @override
  void initState() {
    title = "Home";
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: SliderMenuContainer(
            appBarColor: Colors.white,
            key: _key,
            sliderMenuOpenSize: 200,
            title: Text(
              'G-CART Vendor',
              style: TextStyle(fontSize: 22, fontWeight: FontWeight.w700),
            ),
            sliderMenu: MenuWidget(
              onItemClick: (title) {
                _key.currentState.closeDrawer();
                setState(() {
                  this.title = title;
                });
              },
            ),
            sliderMain: _drawerServices.drawerScreen(title)),
      ),
    );
  }
}
