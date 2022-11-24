import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';

class OrderServices {
  CollectionReference orders = FirebaseFirestore.instance.collection('orders');

  Future<DocumentReference> saveOrder(Map<String, dynamic> data) {
    var result = orders.add(data);
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

  String statusComment(document) {
    if (document['orderStatus'] == 'Picked Up') {
      return 'Your Order is Picked by ${document['deliveryBoy']['name']}';
    }
    if (document['orderStatus'] == 'On the way') {
      return 'Your delivery person ${document['deliveryBoy']['name']} is on the way';
    }
    if (document['orderStatus'] == 'Delivered') {
      return 'Your Order is now Completed';
    }
    return 'Mr. ${document['deliveryBoy']['name']} is on the way to pick your order ';
  }
}
