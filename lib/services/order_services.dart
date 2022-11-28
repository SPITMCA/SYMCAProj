import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:map_launcher/map_launcher.dart';
import 'package:shukrann_delivery_boy/services/firebase_services.dart';
import 'package:url_launcher/url_launcher.dart';

class OrderServices {
  FirebaseServices _services = FirebaseServices();

  Color statusColor(DocumentSnapshot document) {
    if (document['orderStatus'] == 'Accepted') {
      return Colors.blueAccent;
    }
    if (document['orderStatus'] == 'Rejected') {
      return Colors.red;
    }
    if (document['orderStatus'] == 'Picked Up') {
      return Colors.pink.shade900;
    }
    if (document['orderStatus'] == 'On the way') {
      return Colors.purple.shade200;
    }
    if (document['orderStatus'] == 'Delivered') {
      return Colors.green;
    }
    return Colors.orangeAccent;
  }

  Icon statusIcon(DocumentSnapshot document) {
    if (document['orderStatus'] == 'Accepted') {
      return Icon(
        Icons.assignment_turned_in_outlined,
        color: statusColor(document),
      );
    }
    if (document['orderStatus'] == 'Picked Up') {
      return Icon(
        Icons.inventory,
        color: statusColor(document),
      );
    }
    if (document['orderStatus'] == 'On the way') {
      return Icon(
        Icons.delivery_dining,
        color: statusColor(document),
      );
    }
    if (document['orderStatus'] == 'Delivered') {
      return Icon(
        Icons.shopping_bag_outlined,
        color: statusColor(document),
      );
    }
    return Icon(
      Icons.assignment_turned_in_outlined,
      color: statusColor(document),
    );
  }

  Widget statusContainer(document, context) {
    FirebaseServices _services = FirebaseServices();
    if (document['deliveryBoy']['name'].length > 1) {
      if (document['orderStatus'] == 'Accepted') {
        return Container(
          color: Colors.orangeAccent.withOpacity(.2),
          height: 50,
          width: MediaQuery.of(context).size.width,
          child: Padding(
            padding: const EdgeInsets.fromLTRB(40, 8, 40, 8),
            child: TextButton(
              style: ButtonStyle(
                  backgroundColor: ButtonStyleButton.allOrNull<Color>(
                      statusColor(document))),
              child: Text(
                'Update Status Pick Up ',
                style: TextStyle(color: Colors.white),
              ),
              onPressed: () {
                EasyLoading.show();
                _services
                    .updateStatus(id: document.id, status: 'Picked Up')
                    .then((value) {
                  EasyLoading.showSuccess('Order Status is now Picked Up');
                });
              },
            ),
          ),
        );
      }
    }
    if (document['orderStatus'] == 'Picked Up') {
      return Container(
        color: Colors.orangeAccent.withOpacity(.2),
        height: 50,
        width: MediaQuery.of(context).size.width,
        child: Padding(
          padding: const EdgeInsets.fromLTRB(40, 8, 40, 8),
          child: TextButton(
            style: ButtonStyle(
                backgroundColor:
                    ButtonStyleButton.allOrNull<Color>(statusColor(document))),
            child: Text(
              'Update Status On the way',
              style: TextStyle(color: Colors.white),
            ),
            onPressed: () {
              EasyLoading.show();
              _services
                  .updateStatus(id: document.id, status: 'On the way')
                  .then((value) {
                EasyLoading.showSuccess('Order Status is now On the way');
              });
            },
          ),
        ),
      );
    }

    if (document['orderStatus'] == 'On the way') {
      return Container(
        color: Colors.orangeAccent.withOpacity(.2),
        height: 50,
        width: MediaQuery.of(context).size.width,
        child: Padding(
          padding: const EdgeInsets.fromLTRB(40, 8, 40, 8),
          child: TextButton(
            style: ButtonStyle(
                backgroundColor:
                    ButtonStyleButton.allOrNull<Color>(statusColor(document))),
            child: Text(
              'Deliver Order',
              style: TextStyle(color: Colors.white),
            ),
            onPressed: () {
              if (document['cod'] == true) {
                showMyDialog(
                    'Receive Payment', 'Delivered', document.id, context);
              } else {
                EasyLoading.show();
                _services
                    .updateStatus(id: document.id, status: 'Delivered')
                    .then((value) {
                  EasyLoading.showSuccess('Order Status is now Delivered');
                });
              }
            },
          ),
        ),
      );
    }

    return Container(
      color: Colors.orangeAccent.withOpacity(.2),
      height: 30,
      width: MediaQuery.of(context).size.width,
      child: TextButton(
        style: ButtonStyle(
            backgroundColor:
                ButtonStyleButton.allOrNull<Color>(statusColor(document))),
        child: Text(
          'Order Completed',
          style: TextStyle(color: Colors.white),
        ),
        onPressed: () {},
      ),
    );
  }

  showMyDialog(title, status, documentId, context) {
    showCupertinoDialog(
        context: context,
        builder: (BuildContext context) {
          return CupertinoAlertDialog(
            title: Text(title),
            content: Text('Make sure you have received payment'),
            actions: [
              TextButton(
                  onPressed: () {
                    EasyLoading.show();
                    _services
                        .updateStatus(id: documentId, status: 'Delivered')
                        .then((value) {
                      EasyLoading.showSuccess('Order Status is now Delivered');
                      Navigator.pop(context);
                    });
                  },
                  child: Text(
                    'RECEIVE',
                    style: TextStyle(
                        color: Colors.blueAccent, fontWeight: FontWeight.bold),
                  )),
              TextButton(
                  onPressed: () {
                    Navigator.pop(context);
                  },
                  child: Text(
                    'Cancel',
                    style: TextStyle(
                        color: Colors.blueAccent, fontWeight: FontWeight.bold),
                  )),
            ],
          );
        });
  }

  void launchMap(lat, long, name) async {
    final availableMaps = await MapLauncher.installedMaps;
    print(
        availableMaps); // [AvailableMap { mapName: Google Maps, mapType: google }, ...]

    await availableMaps.first.showMarker(
      coords: Coords(lat, long),
      title: name,
    );
  }
}
