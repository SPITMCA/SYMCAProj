import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:flutter_shukran/providers/auth_providers.dart';
import 'package:flutter_shukran/providers/location_provider.dart';
import 'package:flutter_shukran/screens/home_screen.dart';
import 'package:flutter_shukran/screens/map_screen.dart';
import 'package:flutter_shukran/screens/my_orders_screen.dart';
import 'package:flutter_shukran/screens/payment/credit_card_list.dart';
import 'package:flutter_shukran/screens/profile_update_screen.dart';
import 'package:flutter_shukran/screens/welcome_screen.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';
import 'package:provider/provider.dart';

class ProfileScreen extends StatelessWidget {
  static const String id = 'profile_screen';
  @override
  Widget build(BuildContext context) {
    var userDetails = Provider.of<AuthProvider>(context);
    var locationData = Provider.of<LocationProvider>(context);
    User user = FirebaseAuth.instance.currentUser;
    userDetails.getUserDetails();
    return Scaffold(
      appBar: AppBar(
        elevation: 2,
        centerTitle: true,
        iconTheme: IconThemeData(color: Colors.white),
        title: Text('G-CART'),
      ),
      body: SingleChildScrollView(
        physics: ScrollPhysics(),
        child: Column(
          children: [
            Container(
              child: Padding(
                padding: const EdgeInsets.all(8.0),
                child: Text(
                  'My Account',
                  style: TextStyle(fontWeight: FontWeight.bold),
                ),
              ),
            ),
            Stack(
              children: [
                Container(
                  color: Colors.blueGrey,
                  child: Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Column(
                      children: [
                        Row(
                          children: [
                            CircleAvatar(
                              radius: 40,
                              backgroundColor: Colors.blueAccent,
                              child: Text(
                                userDetails.snapshot != null
                                    ? '${userDetails.snapshot['firstName'][0]}'
                                    : '',
                                style: TextStyle(fontSize: 50),
                              ),
                            ),
                            SizedBox(width: 10),
                            Container(
                              height: 70,
                              child: Column(
                                crossAxisAlignment: CrossAxisAlignment.start,
                                mainAxisAlignment:
                                    MainAxisAlignment.spaceBetween,
                                children: [
                                  Text(
                                    userDetails.snapshot != null
                                        ? '${userDetails.snapshot['firstName']} ${userDetails.snapshot['lastName']}'
                                        : 'Update your Name',
                                    style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                        fontSize: 18,
                                        color: Colors.white),
                                  ),
                                  // if (userDetails.snapshot['email'] != null)
                                  Text(
                                    userDetails.snapshot == null
                                        ? ''
                                        : '${userDetails.snapshot['email']}',
                                    style: TextStyle(
                                        color: Colors.white, fontSize: 14),
                                  ),
                                  Text(
                                    user.phoneNumber,
                                    style: TextStyle(
                                        color: Colors.white, fontSize: 14),
                                  )
                                ],
                              ),
                            ),
                          ],
                        ),
                        SizedBox(height: 10),
                        if (userDetails.snapshot != null)
                          ListTile(
                            tileColor: Colors.white,
                            leading: Icon(
                              Icons.location_on,
                              color: Colors.blueAccent,
                            ),
                            title: userDetails.snapshot == null
                                ? Text('')
                                : Text(
                                    userDetails.snapshot['location'],
                                  ),
                            subtitle: userDetails.snapshot == null
                                ? Text('')
                                : Text(
                                    userDetails.snapshot['address'],
                                    maxLines: 1,
                                  ),
                            trailing: SizedBox(
                              width: 80,
                              child: OutlineButton(
                                borderSide:
                                    BorderSide(color: Colors.blueAccent),
                                child: Text(
                                  'Change',
                                  style: TextStyle(color: Colors.blueAccent),
                                ),
                                onPressed: () {
                                  locationData
                                      .getCurrentPosition()
                                      .then((value) {
                                    EasyLoading.show(status: 'Please Wait...');
                                    if (value != null) {
                                      EasyLoading.dismiss();
                                      pushNewScreenWithRouteSettings(
                                        context,
                                        settings:
                                            RouteSettings(name: MapScreen.id),
                                        screen: MapScreen(),
                                        withNavBar: false,
                                        pageTransitionAnimation:
                                            PageTransitionAnimation.cupertino,
                                      );
                                    } else {
                                      print('Permission not Allowed');
                                    }
                                  });
                                },
                              ),
                            ),
                          )
                      ],
                    ),
                  ),
                ),
                Positioned(
                  right: 10,
                  top: 10,
                  child: IconButton(
                    onPressed: () {
                      pushNewScreenWithRouteSettings(
                        context,
                        settings: RouteSettings(name: UpdateProfile.id),
                        screen: UpdateProfile(),
                        withNavBar: false,
                        pageTransitionAnimation:
                            PageTransitionAnimation.cupertino,
                      );
                    },
                    icon: Icon(Icons.edit_outlined),
                    color: Colors.white,
                  ),
                )
              ],
            ),
            ListTile(
              onTap: () {
                pushNewScreenWithRouteSettings(
                  context,
                  settings: RouteSettings(name: MyOrdersScreen.id),
                  screen: MyOrdersScreen(),
                  withNavBar: false,
                  pageTransitionAnimation: PageTransitionAnimation.cupertino,
                );
              },
              leading: Icon(Icons.history),
              title: Text('My Orders'),
              horizontalTitleGap: 2,
            ),
            Divider(
              color: Colors.blueGrey,
              thickness: 0.5,
            ),
            ListTile(
              onTap: () {
                pushNewScreenWithRouteSettings(
                  context,
                  settings: RouteSettings(name: CreditCardList.id),
                  screen: CreditCardList(),
                  withNavBar: false,
                  pageTransitionAnimation: PageTransitionAnimation.cupertino,
                );
              },
              leading: Icon(Icons.credit_card),
              title: Text('Manage Credit Cards'),
              horizontalTitleGap: 2,
            ),
            Divider(
              color: Colors.blueGrey,
              thickness: 0.5,
            ),
            // ListTile(
            //   leading: Icon(Icons.comment_outlined),
            //   title: Text('My Ratings & Reviews'),
            //   horizontalTitleGap: 2,
            // ),
            // Divider(
            //   color: Colors.blueGrey,
            //   thickness: 0.5,
            // ),
            ListTile(
              leading: Icon(Icons.notifications_none_outlined),
              title: Text('Notifications'),
              horizontalTitleGap: 2,
            ),
            Divider(
              color: Colors.blueGrey,
              thickness: 0.5,
            ),
            ListTile(
              leading: Icon(Icons.power_settings_new_outlined),
              title: Text('Logout'),
              horizontalTitleGap: 2,
              onTap: () {
                FirebaseAuth.instance.signOut();
                pushNewScreenWithRouteSettings(
                  context,
                  settings: RouteSettings(name: WelcomeScreen.id),
                  screen: WelcomeScreen(),
                  withNavBar: false,
                  pageTransitionAnimation: PageTransitionAnimation.cupertino,
                );
              },
            ),
            Divider(
              color: Colors.blueGrey,
              thickness: 0.5,
            )
          ],
        ),
      ),
    );
  }
}
