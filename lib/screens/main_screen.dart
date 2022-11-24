import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/screens/favourite_screen.dart';
import 'package:flutter_shukran/screens/home_screen.dart';
import 'package:flutter_shukran/screens/my_orders_screen.dart';
import 'package:flutter_shukran/screens/profile_screen.dart';
import 'package:flutter_shukran/widgets/cart/cart_notification.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';

class MainScreen extends StatelessWidget {
  static const String id = 'main_screen';
  final String _notify = 'asd';

  @override
  Widget build(BuildContext context) {
    PersistentTabController _controller;
    _controller = PersistentTabController(initialIndex: 0);
    List<Widget> _buildScreens() {
      return [
        HomeScreen(),
        FavouriteScreen(),
        MyOrdersScreen(),
        ProfileScreen(),
      ];
    }

    List<PersistentBottomNavBarItem> _navBarsItems() {
      return [
        PersistentBottomNavBarItem(
          icon: Icon(CupertinoIcons.home),
          title: ("Home"),
          activeColorPrimary: Colors.blueAccent,
          inactiveColorPrimary: CupertinoColors.systemGrey,
        ),
        PersistentBottomNavBarItem(
          icon: Icon(CupertinoIcons.square_favorites_alt),
          title: ("Favourites"),
          activeColorPrimary: Colors.blueAccent,
          inactiveColorPrimary: CupertinoColors.systemGrey,
        ),
        PersistentBottomNavBarItem(
          icon: Icon(CupertinoIcons.bag),
          title: ("My Orders"),
          activeColorPrimary: Colors.blueAccent,
          inactiveColorPrimary: CupertinoColors.systemGrey,
        ),
        PersistentBottomNavBarItem(
          icon: Icon(CupertinoIcons.profile_circled),
          title: ("My Profile"),
          activeColorPrimary: Colors.blueAccent,
          inactiveColorPrimary: CupertinoColors.systemGrey,
        ),
      ];
    }

    return Scaffold(
      floatingActionButton: Padding(
        padding: const EdgeInsets.only(bottom: 56),
        child: _notify == null
            ? CircularProgressIndicator()
            : Container(child: CartNotification()),
      ),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      body: PersistentTabView(
        context,
        navBarHeight: 56,
        // padding: NavBarPadding.only(top: 10),
        controller: _controller,
        screens: _buildScreens(),
        items: _navBarsItems(),
        confineInSafeArea: true,
        backgroundColor: Colors.white, // Default is Colors.white.
        handleAndroidBackButtonPress: true, // Default is true.
        resizeToAvoidBottomInset:
            true, // This needs to be true if you want to move up the screen when keyboard appears. Default is true.
        stateManagement: true, // Default is true.
        hideNavigationBarWhenKeyboardShows:
            true, // Recommended to set 'resizeToAvoidBottomInset' as true while using this argument. Default is true.
        decoration: NavBarDecoration(
          borderRadius: BorderRadius.only(
              topRight: Radius.circular(4), topLeft: Radius.circular(4)),
          border: Border.all(color: Colors.black45),
          colorBehindNavBar: Colors.white,
        ),
        popAllScreensOnTapOfSelectedTab: true,
        popActionScreens: PopActionScreensType.all,
        itemAnimationProperties: ItemAnimationProperties(
          // Navigation Bar's items animation properties.
          duration: Duration(milliseconds: 200),
          curve: Curves.ease,
        ),
        screenTransitionAnimation: ScreenTransitionAnimation(
          // Screen transition animation on change of selected tab.
          animateTabTransition: true,
          curve: Curves.ease,
          duration: Duration(milliseconds: 200),
        ),
        navBarStyle:
            NavBarStyle.style9, // Choose the nav bar style with this property.
      ),
    );
  }
}
