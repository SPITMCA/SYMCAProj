import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/auth_providers.dart';
import 'package:flutter_shukran/providers/location_provider.dart';
import 'package:flutter_shukran/screens/home_screen.dart';
import 'package:flutter_shukran/screens/landing_screen.dart';
import 'package:flutter_shukran/screens/login_screen.dart';
import 'package:flutter_shukran/screens/main_screen.dart';
import 'package:flutter_spinkit/flutter_spinkit.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:provider/provider.dart';

class MapScreen extends StatefulWidget {
  static const String id = 'map_screen';

  @override
  _MapScreenState createState() => _MapScreenState();
}

class _MapScreenState extends State<MapScreen> {
  LatLng currentLocation = LatLng(37.421632, 122.084664);
  GoogleMapController _googleMapController;
  bool _locating = false;
  bool _loggedIn = false;
  User user;

  @override
  void initState() {
    // TODO: implement initState
    getCurrentUser();
    super.initState();
  }

  void getCurrentUser() {
    setState(() {
      user = FirebaseAuth.instance.currentUser;
    });
    if (user != null) {
      setState(() {
        _loggedIn = true;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    final locationData = Provider.of<LocationProvider>(context);
    final _auth = Provider.of<AuthProvider>(context);

    setState(() {
      currentLocation = LatLng(locationData.latitude, locationData.longitude);
    });

    void onCreated(GoogleMapController controller) {
      setState(() {
        _googleMapController = controller;
      });
    }

    return Scaffold(
      body: SafeArea(
        child: Stack(
          children: [
            GoogleMap(
              initialCameraPosition: CameraPosition(
                target: currentLocation,
                zoom: 14.4746,
              ),
              zoomControlsEnabled: false,
              minMaxZoomPreference: MinMaxZoomPreference(1.5, 20.8),
              myLocationEnabled: true,
              myLocationButtonEnabled: true,
              mapType: MapType.normal,
              mapToolbarEnabled: true,
              onCameraMove: (CameraPosition position) {
                locationData.onCameraMove(position);
                setState(() {
                  _locating = true;
                });
              },
              onMapCreated: onCreated,
              onCameraIdle: () {
                locationData.getMoveCamera();
                setState(() {
                  _locating = false;
                });
              },
            ),
            Center(
              child: Container(
                height: 35.0,
                margin: EdgeInsets.only(bottom: 40.0),
                child: Image.asset(
                  'images/marker.png',
                  color: Colors.black,
                ),
              ),
            ),
            Center(
              child: SpinKitPulse(
                color: Colors.lightBlueAccent,
                size: 100.0,
              ),
            ),
            Positioned(
              bottom: 0.0,
              child: Container(
                height: 200.0,
                width: MediaQuery.of(context).size.width,
                color: Colors.white,
                child: Padding(
                  padding: const EdgeInsets.only(left: 20.0, right: 20.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      _locating
                          ? LinearProgressIndicator(
                              valueColor: AlwaysStoppedAnimation<Color>(
                                  Colors.blueAccent),
                              backgroundColor: Colors.transparent,
                            )
                          : Container(),
                      Padding(
                        padding: const EdgeInsets.only(left: 10.0, right: 10.0),
                        child: TextButton.icon(
                          onPressed: () {},
                          icon: Icon(Icons.location_searching),
                          label: Flexible(
                            child: Text(
                              _locating
                                  ? 'Loading...'
                                  : locationData.selectedAddress == null
                                      ? 'Locating...'
                                      : locationData
                                          .selectedAddress.featureName,
                              style: TextStyle(
                                fontWeight: FontWeight.bold,
                                fontSize: 20.0,
                                color: Colors.black,
                              ),
                            ),
                          ),
                        ),
                      ),
                      Padding(
                        padding: const EdgeInsets.only(left: 20.0, right: 20.0),
                        child: Text(
                          _locating
                              ? ''
                              : locationData.selectedAddress == null
                                  ? 'Loading...'
                                  : locationData.selectedAddress.addressLine,
                          style: TextStyle(
                            color: Colors.black54,
                          ),
                          overflow: TextOverflow.ellipsis,
                        ),
                      ),
                      SizedBox(height: 20.0),
                      Padding(
                        padding: const EdgeInsets.all(20.0),
                        child: SizedBox(
                          width: MediaQuery.of(context).size.width - 40,
                          child: AbsorbPointer(
                            absorbing: _locating ? true : false,
                            child: FlatButton(
                              onPressed: () {
                                //save address in shared Preferences.
                                locationData.savePrefs();
                                if (_loggedIn == false) {
                                  Navigator.pushReplacementNamed(
                                      context, LoginScreen.id);
                                } else {
                                  setState(() {
                                    _auth.latitude = locationData.latitude;
                                    _auth.longitude = locationData.longitude;
                                    _auth.address = locationData
                                        .selectedAddress.addressLine;
                                    _auth.location = locationData
                                        .selectedAddress.featureName;
                                  });
                                  _auth.updateUser(
                                    id: user.uid,
                                    number: user.phoneNumber,
                                  );
                                  Navigator.pushReplacementNamed(
                                      context, MainScreen.id);
                                }
                              },
                              color:
                                  _locating ? Colors.grey : Colors.blueAccent,
                              child: Text(
                                'CONFIRM LOCATION',
                                style: TextStyle(color: Colors.white),
                              ),
                            ),
                          ),
                        ),
                      )
                    ],
                  ),
                ),
              ),
            )
          ],
        ),
      ),
    );
  }
}
// show me issue
