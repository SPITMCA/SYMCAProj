import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:map_launcher/map_launcher.dart';
import 'package:shukran_vendor/services/firebase_services.dart';
import 'package:shukran_vendor/widgets/delivery_boy_list.dart';
import 'package:url_launcher/url_launcher.dart';

class OrderServices {
  DocumentSnapshot document;
  CollectionReference orders = FirebaseFirestore.instance.collection('orders');

  Future<void> updateOrderStatus(documentId, status) {
    var result = orders.doc(documentId).update({
      'orderStatus': status,
    });
    return result;
  }

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
      return Colors.purple.shade900;
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
    FireBaseServices _services = FireBaseServices();
    if (document['deliveryBoy']['name'].length > 1) {
      return document['deliveryBoy']['image'] == null
          ? Container()
          : ListTile(
              leading: CircleAvatar(
                backgroundColor: Colors.white,
                child: Image.network(document['deliveryBoy']['image']),
              ),
              title: new Text(document['deliveryBoy']['name']),
              trailing: Row(
                mainAxisSize: MainAxisSize.min,
                children: [
                  InkWell(
                    onTap: () {
                      GeoPoint location = document['deliveryBoy']['location'];
                      launchMap(location, document['deliveryBoy']['name']);
                    },
                    child: Container(
                      decoration: BoxDecoration(
                          color: Colors.blueAccent,
                          borderRadius: BorderRadius.circular(4)),
                      child: Padding(
                        padding: const EdgeInsets.only(
                            left: 8, right: 8, top: 2, bottom: 2),
                        child: Icon(
                          Icons.map,
                          size: 20,
                          color: Colors.white,
                        ),
                      ),
                    ),
                  ),
                  SizedBox(width: 10),
                  InkWell(
                    onTap: () {
                      launch('tel:+91${document['deliveryBoy']['phone']}');
                    },
                    child: Container(
                      decoration: BoxDecoration(
                          color: Colors.blueAccent,
                          borderRadius: BorderRadius.circular(4)),
                      child: Padding(
                        padding: const EdgeInsets.only(
                            left: 8, right: 8, top: 2, bottom: 2),
                        child: Icon(
                          Icons.phone_in_talk,
                          size: 20,
                          color: Colors.white,
                        ),
                      ),
                    ),
                  ),
                  // IconButton(
                  //   icon: Icon(
                  //     Icons.phone,
                  //     color: Colors.blueAccent,
                  //   ),
                  //   onPressed: () {
                  //
                  //   },
                  // ),
                ],
              ),
            );
    }
    if (document['orderStatus'] == 'Accepted') {
      return Container(
        color: Colors.grey.shade300,
        height: 50,
        width: MediaQuery.of(context).size.width,
        child: Padding(
          padding: const EdgeInsets.fromLTRB(40, 8, 40, 8),
          child: FlatButton(
            color: Colors.orangeAccent,
            child: Text(
              'Assign Delivery Boy',
              style: TextStyle(color: Colors.white),
            ),
            onPressed: () {
              print('Assign Delivery Boy');
              //delivery boy List
              showDialog(
                  context: context,
                  builder: (BuildContext context) {
                    return DeliveryBoyList(document);
                  });
            },
          ),
        ),
      );
    }
    return Container(
      color: Colors.grey.shade300,
      height: 50,
      child: Row(
        children: [
          Expanded(
            child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: FlatButton(
                color: Colors.blueGrey,
                child: Text(
                  'Accept',
                  style: TextStyle(color: Colors.white),
                ),
                onPressed: () {
                  showMyDialog(
                      'Accept Order', 'Accepted', document.id, context);
                },
              ),
            ),
          ),
          Expanded(
            child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: AbsorbPointer(
                absorbing: document['orderStatus'] == 'Rejected' ? true : false,
                child: FlatButton(
                  color: document['orderStatus'] == 'Rejected'
                      ? Colors.grey
                      : Colors.red,
                  onPressed: () {
                    showMyDialog(
                        'Reject Order', 'Rejected', document.id, context);
                  },
                  child: Text(
                    'Reject',
                    style: TextStyle(color: Colors.white),
                  ),
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }

  showMyDialog(title, status, documentId, context) {
    OrderServices _orderServices = OrderServices();
    showCupertinoDialog(
        context: context,
        builder: (BuildContext context) {
          return CupertinoAlertDialog(
            title: Text(title),
            content: Text('Are you Sure?'),
            actions: [
              TextButton(
                  onPressed: () {
                    EasyLoading.show(status: 'Updating Status...');
                    status == 'Accepted'
                        ? _orderServices
                            .updateOrderStatus(documentId, status)
                            .then((value) {
                            EasyLoading.showSuccess('Updated Successfully');
                          })
                        : _orderServices
                            .updateOrderStatus(documentId, status)
                            .then((value) {
                            EasyLoading.showSuccess('Updated Successfully');
                          });
                    Navigator.pop(context);
                  },
                  child: Text(
                    'OK',
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

  void launchMap(GeoPoint location, name) async {
    final availableMaps = await MapLauncher.installedMaps;
    print(
        availableMaps); // [AvailableMap { mapName: Google Maps, mapType: google }, ...]

    await availableMaps.first.showMarker(
      coords: Coords(location.latitude, location.longitude),
      title: name,
    );
  }

  void launchCall(number) async => await canLaunch(number)
      ? await launch(number)
      : throw 'Could not launch $number';
}
