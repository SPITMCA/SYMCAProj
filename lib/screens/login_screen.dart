import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/auth_providers.dart';
import 'package:flutter_shukran/providers/location_provider.dart';
import 'package:flutter_shukran/screens/home_screen.dart';
import 'package:provider/provider.dart';

import '../constants.dart';

class LoginScreen extends StatefulWidget {
  static const String id = 'login_screen';

  @override
  _LoginScreenState createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  bool _validPhoneNumber = false;
  var _phoneNumberController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    final auth = Provider.of<AuthProvider>(context);
    final locationData = Provider.of<LocationProvider>(context);
    return Scaffold(
      body: SafeArea(
        child: Container(
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
                            style: TextStyle(color: Colors.red, fontSize: 12),
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
                        setState(() {
                          _validPhoneNumber = true;
                        });
                      } else {
                        setState(() {
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
                              setState(() {
                                auth.loading = true;
                                auth.screen = 'MapScreen';
                                auth.longitude = locationData.longitude;
                                auth.latitude = locationData.latitude;
                                auth.address =
                                    locationData.selectedAddress.addressLine;
                              });
                              String number =
                                  '+91${_phoneNumberController.text}';
                              auth
                                  .verifyPhone(
                                context: context,
                                number: number,
                              )
                                  .then((value) {
                                _phoneNumberController.clear();

                                setState(() {
                                  auth.loading = false;
                                });
                              });
                              // Navigator.pushReplacementNamed(
                              //     context, HomeScreen.id);
                            },
                            child: auth.loading
                                ? CircularProgressIndicator(
                                    valueColor: AlwaysStoppedAnimation<Color>(
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
        ),
      ),
    );
  }
}

//login
