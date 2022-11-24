import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/location_provider.dart';
import 'package:flutter_shukran/screens/home_screen.dart';
import 'package:flutter_shukran/screens/map_screen.dart';
import 'package:flutter_shukran/services/user_service.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LandingScreen extends StatefulWidget {
  static const String id = 'landing_screen';

  @override
  _LandingScreenState createState() => _LandingScreenState();
}

class _LandingScreenState extends State<LandingScreen> {
  LocationProvider _locationProvider = LocationProvider();
  bool _loading = false;
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: SingleChildScrollView(
          child: Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              Padding(
                padding: const EdgeInsets.all(10.0),
                child: Text(
                  'Delivery Address Not Set',
                  style: TextStyle(
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
              Padding(
                padding: const EdgeInsets.all(10.0),
                child: Text(
                  'Please Provide the Delivery address to find your nearest Store',
                  style: TextStyle(color: Colors.grey),
                ),
              ),
              Container(
                child: Image.asset(
                  'images/city.png',
                  fit: BoxFit.fill,
                  color: Colors.black12,
                ),
              ),
              FlatButton(
                onPressed: () {
                  Navigator.pushReplacementNamed(context, HomeScreen.id);
                },
                child: Text('Confirm Your Location'),
              ),
              FlatButton(
                color: Colors.blueAccent,
                onPressed: () async {
                  setState(() {
                    _loading = true;
                  });
                  await _locationProvider.getCurrentPosition();
                  if (_locationProvider.selectedAddress == true) {
                    Navigator.pushNamed(context, MapScreen.id);
                  } else {
                    Future.delayed(Duration(seconds: 4), () {
                      if (_locationProvider.selectedAddress == false) {
                        print('Permission Not Allowed');
                        setState(() {
                          _loading = false;
                        });
                        ScaffoldMessenger.of(context).showSnackBar(SnackBar(
                            content: Text(
                                'Please Allow permission to see all your near Stores')));
                      }
                    });
                  }
                  Navigator.pushNamed(context, MapScreen.id);
                },
                child: Text(
                  'Set Your Location',
                  style: TextStyle(color: Colors.white),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
