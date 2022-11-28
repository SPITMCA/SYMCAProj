import 'package:cloud_firestore/cloud_firestore.dart';

class Vendor {
  final String shopName;
  final DocumentSnapshot document;

  Vendor({this.shopName, this.document});
}
