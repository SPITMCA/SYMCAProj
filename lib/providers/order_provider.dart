import 'package:flutter/cupertino.dart';

class OrderProvider extends ChangeNotifier {
  String status;
  String amount;
  bool success = false;

  filterOrder(status) {
    this.status = status;
    notifyListeners();
  }

  totalAmount(amount) {
    this.amount = amount.toStringAsFixed(0);
    notifyListeners();
  }

  paymentStatus(success) {
    this.success = success;
    notifyListeners();
  }
}
