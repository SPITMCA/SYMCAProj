import 'package:firebase_core/firebase_core.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:provider/provider.dart';
import 'package:shukran_vendor/providers/auth_provider.dart';
import 'package:shukran_vendor/providers/order_provider.dart';
import 'package:shukran_vendor/providers/product_provider.dart';
import 'package:shukran_vendor/screens/add_edit_coupon_screen.dart';
import 'package:shukran_vendor/screens/add_new_product_screen.dart';
import 'package:shukran_vendor/screens/banner_screen.dart';
import 'package:shukran_vendor/screens/coupon_screen.dart';
import 'package:shukran_vendor/screens/dashboard_screen.dart';
import 'package:shukran_vendor/screens/login_screen.dart';
import 'package:shukran_vendor/screens/product_banners_screen.dart';
import 'package:shukran_vendor/screens/products_screen.dart';
import 'package:shukran_vendor/screens/register_screen.dart';
import 'package:shukran_vendor/screens/home_screen.dart';
import 'package:shukran_vendor/screens/splash_screen.dart';
import 'package:shukran_vendor/widgets/reset_password_screen.dart';

void main() async {
  Provider.debugCheckInvalidValueType = null;
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp();
  runApp(MultiProvider(
    providers: [
      ChangeNotifierProvider(
        create: (_) => AuthProvider(),
      ),
      ChangeNotifierProvider(
        create: (_) => ProductProvider(),
      ),
      ChangeNotifierProvider(
        create: (_) => OrderProvider(),
      ),
    ],
    child: MyApp(),
  ));
}

class MyApp extends StatelessWidget {
  const MyApp({Key key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      theme: ThemeData(
        primaryColor: Colors.blueAccent,
        fontFamily: 'Lato',
      ),
      builder: EasyLoading.init(),
      debugShowCheckedModeBanner: false,
      initialRoute: SplashScreen.id,
      routes: {
        SplashScreen.id: (context) => SplashScreen(),
        RegisterScreen.id: (context) => RegisterScreen(),
        HomeScreen.id: (context) => HomeScreen(),
        LoginScreen.id: (context) => LoginScreen(),
        ResetPassword.id: (context) => ResetPassword(),
        MainScreen.id: (context) => MainScreen(),
        ProductScreen.id: (context) => ProductScreen(),
        AddNewProduct.id: (context) => AddNewProduct(),
        BannerScreen.id: (context) => BannerScreen(),
        CouponScreen.id: (context) => CouponScreen(),
        AddEditCoupon.id: (context) => AddEditCoupon(),
        ProductBannerScreen.id: (context) => ProductBannerScreen(),
      },
    );
  }
}
