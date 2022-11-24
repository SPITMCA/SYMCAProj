import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:geolocator/geolocator.dart';
import 'package:map_launcher/map_launcher.dart';
import 'package:shukran_vendor/services/firebase_services.dart';
import 'package:shukran_vendor/services/order_services.dart';
import 'package:url_launcher/url_launcher.dart';

class DeliveryBoyList extends StatefulWidget {
  final DocumentSnapshot document;
  DeliveryBoyList(this.document);

  @override
  _DeliveryBoyListState createState() => _DeliveryBoyListState();
}

class _DeliveryBoyListState extends State<DeliveryBoyList> {
  FireBaseServices _services = FireBaseServices();
  OrderServices _orderServices = OrderServices();
  GeoPoint _shopLocation;

  @override
  void initState() {
    _services.getShopDetails().then((value) {
      if (value != null) {
        if (mounted) {
          _shopLocation = value['location'];
        }
      } else {
        print('no data');
      }
    });
    super.initState();
  }

  // void launchMap(GeoPoint location, name) async {
  //   final availableMaps = await MapLauncher.installedMaps;
  //   print(
  //       availableMaps); // [AvailableMap { mapName: Google Maps, mapType: google }, ...]
  //
  //   await availableMaps.first.showMarker(
  //     coords: Coords(location.latitude, location.longitude),
  //     title: name,
  //   );
  // }

  @override
  Widget build(BuildContext context) {
    return Dialog(
      child: Container(
        height: MediaQuery.of(context).size.height,
        width: MediaQuery.of(context).size.width,
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            AppBar(
              title: Text('Select Delivery Boy'),
            ),
            Container(
              child: StreamBuilder<QuerySnapshot>(
                stream: _services.boys
                    .where('accVerified', isEqualTo: true)
                    .snapshots(),
                builder: (BuildContext context,
                    AsyncSnapshot<QuerySnapshot> snapshot) {
                  if (snapshot.hasError) {
                    return Text('Something went wrong');
                  }

                  if (!snapshot.hasData) {
                    return Center(
                      child: CircularProgressIndicator(),
                    );
                  }

                  return new ListView(
                    shrinkWrap: true,
                    children:
                        snapshot.data.docs.map((DocumentSnapshot document) {
                      GeoPoint location = document['location'];
                      double distanceInMeters = _shopLocation == null
                          ? 0.0
                          : Geolocator.distanceBetween(
                                  _shopLocation.latitude,
                                  _shopLocation.longitude,
                                  location.latitude,
                                  location.longitude) /
                              1000;
                      if (distanceInMeters > 10) {
                        return Container();
                      }
                      Map<String, dynamic> data =
                          document.data() as Map<String, dynamic>;
                      return Column(
                        children: [
                          new ListTile(
                            onTap: () {
                              EasyLoading.show(status: 'Assigning Boys');
                              _services
                                  .selectBoys(
                                      orderId: widget.document.id,
                                      email: document['email'],
                                      phone: document['mobile'],
                                      name: document['name'],
                                      location: document['location'],
                                      image: document['imageUrl'])
                                  .then((value) {
                                EasyLoading.showSuccess(
                                    'Assigned Delivery Boy');
                                Navigator.pop(context);
                              });
                            },
                            leading: CircleAvatar(
                              backgroundColor: Colors.white,
                              child: Image.network(document['imageUrl']),
                            ),
                            title: new Text(document['name']),
                            subtitle: new Text(
                                '${distanceInMeters.toStringAsFixed(1)} Km'),
                            trailing: Row(
                              mainAxisSize: MainAxisSize.min,
                              children: [
                                IconButton(
                                  icon: Icon(
                                    Icons.map,
                                    color: Colors.blueAccent,
                                  ),
                                  onPressed: () {
                                    GeoPoint location = document['location'];
                                    _orderServices.launchMap(
                                        location, document['name']);
                                  },
                                ),
                                IconButton(
                                  icon: Icon(
                                    Icons.phone,
                                    color: Colors.blueAccent,
                                  ),
                                  onPressed: () {
                                    launch('tel:+91${document['mobile']}');
                                  },
                                ),
                              ],
                            ),
                          ),
                          Divider(
                            height: 2,
                            color: Colors.grey,
                          ),
                        ],
                      );
                    }).toList(),
                  );
                },
              ),
            ),
          ],
        ),
      ),
    );
  }
}
