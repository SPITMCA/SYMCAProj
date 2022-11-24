import 'package:flutter/cupertino.dart';

class OrderProvider extends ChangeNotifier {
  String status;

  filterOrder(status) {
    this.status = status;
    notifyListeners();
  }
}
