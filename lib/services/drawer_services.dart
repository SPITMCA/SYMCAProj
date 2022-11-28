import 'package:flutter/material.dart';
import 'package:shukran_vendor/screens/add_edit_coupon_screen.dart';
import 'package:shukran_vendor/screens/banner_screen.dart';
import 'package:shukran_vendor/screens/coupon_screen.dart';
import 'package:shukran_vendor/screens/dashboard_screen.dart';
import 'package:shukran_vendor/screens/order_screen.dart';
import 'package:shukran_vendor/screens/product_banners_screen.dart';
import 'package:shukran_vendor/screens/products_screen.dart';

class DrawerServices {
  Widget drawerScreen(title) {
    if (title == 'Dashboard') {
      return MainScreen();
    }
    if (title == 'Products') {
      return ProductScreen();
    }
    if (title == 'Banners') {
      return BannerScreen();
    }
    if (title == 'Coupons') {
      return CouponScreen();
    }
    if (title == 'Orders') {
      return OrderScreen();
    }
    if (title == 'Product Banners') {
      return ProductBannerScreen();
    }
    return MainScreen();
  }
}
