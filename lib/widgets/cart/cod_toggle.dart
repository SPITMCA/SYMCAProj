import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/cart_provider.dart';
import 'package:provider/provider.dart';
import 'package:toggle_bar/toggle_bar.dart';

class CodToggleSwitch extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    var _cart = Provider.of<CartProvider>(context);

    return Container(
      color: Colors.white,
      child: ToggleBar(
          selectedTabColor: Colors.blueAccent,
          textColor: Colors.black,
          selectedTextColor: Colors.white,
          backgroundColor: Colors.grey.shade300,
          labels: ["Pay Online", "Cash on delivery"],
          onSelectionUpdated: (index) {
            _cart.getPaymentMethod(index);
          } // Do something with index
          ),
    );
  }
}
