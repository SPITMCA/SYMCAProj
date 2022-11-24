import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/constants.dart';
import 'package:flutter_shukran/providers/auth_providers.dart';
import 'package:flutter_shukran/providers/location_provider.dart';
import 'package:flutter_shukran/screens/map_screen.dart';
import 'package:flutter_shukran/screens/onborad_screen.dart';
import 'package:provider/provider.dart';

class WelcomeScreen extends StatefulWidget {
  static const String id = 'welcome-screen';

  @override
  _WelcomeScreenState createState() => _WelcomeScreenState();
}

class _WelcomeScreenState extends State<WelcomeScreen> {
  @override
  Widget build(BuildContext context) {
    final auth = Provider.of<AuthProvider>(context);

    bool _validPhoneNumber = false;
    var _phoneNumberController = TextEditingController();

    void showBottomSheet(context) {
      showModalBottomSheet(
        context: context,
        builder: (context) => StatefulBuilder(
          builder: (context, StateSetter myState) {
            return Container(
              child: SingleChildScrollView(
                child: Padding(
                  padding: const EdgeInsets.all(20.0),
                  child: Column(
                    // mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Visibility(
                        visible: auth.error == 'Invalid OTP' ? true : false,
                        child: Container(
                          child: Column(
                            children: [
                              Text(
                                auth.error,
                                style:
                                    TextStyle(color: Colors.red, fontSize: 12),
                              ),
                              SizedBox(
                                height: 3,
                              )
                            ],
                          ),
                        ),
                      ),
                      Text(
                        'Login',
                        style: kPageViewStyle,
                      ),
                      Text(
                        'Enter Your Phone Number to Process',
                        style: TextStyle(fontSize: 15.0),
                      ),
                      TextField(
                        controller: _phoneNumberController,
                        decoration: InputDecoration(
                          prefixText: '+91',
                          labelText: 'Enter the 10 digit number',
                        ),
                        autofocus: true,
                        keyboardType: TextInputType.phone,
                        maxLength: 10,
                        onChanged: (value) {
                          if (value.length == 10) {
                            myState(() {
                              _validPhoneNumber = true;
                            });
                          } else {
                            myState(() {
                              _validPhoneNumber = false;
                            });
                          }
                        },
                      ),
                      SizedBox(
                        height: 10.0,
                      ),
                      Row(
                        children: [
                          Expanded(
                            child: AbsorbPointer(
                              absorbing: _validPhoneNumber ? false : true,
                              child: FlatButton(
                                color: _validPhoneNumber
                                    ? Theme.of(context).primaryColor
                                    : Colors.grey,
                                onPressed: () {
                                  myState(() {
                                    auth.loading = true;
                                  });
                                  String number =
                                      '+91${_phoneNumberController.text}';
                                  auth
                                      .verifyPhone(
                                          context: context, number: number)
                                      .then((value) {
                                    _phoneNumberController.clear();
                                    auth.loading = false;
                                  });
                                },
                                child: auth.loading
                                    ? CircularProgressIndicator(
                                        valueColor:
                                            AlwaysStoppedAnimation<Color>(
                                                Colors.white),
                                      )
                                    : Text(
                                        _validPhoneNumber
                                            ? 'Continue'
                                            : 'Enter Phone Number',
                                        style: TextStyle(color: Colors.white),
                                      ),
                              ),
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
              ),
            );
          },
        ),
      ).whenComplete(() {
        setState(() {
          auth.loading = false;
          _phoneNumberController.clear();
        });
      });
    }

    final locationData = Provider.of<LocationProvider>(context, listen: false);

    return Scaffold(
      body: Padding(
          padding: const EdgeInsets.all(20.0),
          child: Stack(
            children: [
              Positioned(
                right: 0.0,
                top: 10.0,
                child: FlatButton(
                  onPressed: () {},
                  child: Text(
                    'Skip',
                    style: TextStyle(fontSize: 15.0, color: Colors.blueAccent),
                  ),
                ),
              ),
              Column(
                children: [
                  Expanded(child: OnBoardScreen()),
                  Text(
                    'Ready to order from your Nearest Shop?',
                    style: TextStyle(color: Colors.grey),
                  ),
                  SizedBox(height: 20.0),
                  FlatButton(
                    onPressed: () async {
                      setState(() {
                        locationData.loading = true;
                      });
                      await locationData.getCurrentPosition();
                      if (locationData.permissionAllowed == true) {
                        Navigator.pushReplacementNamed(context, MapScreen.id);
                        setState(() {
                          locationData.loading = false;
                        });
                      } else {
                        print('Permission not Allowed');
                        setState(() {
                          locationData.loading = true;
                        });
                      }
                    },
                    color: Colors.blueAccent,
                    child: locationData.loading
                        ? CircularProgressIndicator(
                            valueColor:
                                AlwaysStoppedAnimation<Color>(Colors.white),
                          )
                        : Text(
                            'Set Delivery Location',
                            style: TextStyle(color: Colors.white),
                          ),
                  ),
                  FlatButton(
                    onPressed: () {
                      setState(() {
                        auth.screen = 'screen';
                      });
                      showBottomSheet(context);
                    },
                    child: RichText(
                      text: TextSpan(
                        text: 'Already An User?',
                        style: TextStyle(color: Colors.grey),
                        children: [
                          TextSpan(
                            text: 'Login',
                            style: TextStyle(
                                fontWeight: FontWeight.w700,
                                color: Colors.blueAccent),
                          )
                        ],
                      ),
                    ),
                  )
                ],
              ),
            ],
          )),
    );
  }
}
