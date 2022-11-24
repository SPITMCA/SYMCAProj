import 'package:firebase_core/firebase_core.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:flutter_shukran/providers/auth_providers.dart';
import 'package:flutter_shukran/providers/cart_provider.dart';
import 'package:flutter_shukran/providers/coupon_provider.dart';
import 'package:flutter_shukran/providers/location_provider.dart';
import 'package:flutter_shukran/providers/order_provider.dart';
import 'package:flutter_shukran/providers/store_providers.dart';
import 'package:flutter_shukran/screens/cart_screen.dart';
import 'package:flutter_shukran/screens/favourite_detail_screen.dart';
import 'package:flutter_shukran/screens/favourite_screen.dart';
import 'package:flutter_shukran/screens/home_screen.dart';
import 'package:flutter_shukran/screens/landing_screen.dart';
import 'package:flutter_shukran/screens/login_screen.dart';
import 'package:flutter_shukran/screens/main_screen.dart';
import 'package:flutter_shukran/screens/map_screen.dart';
import 'package:flutter_shukran/screens/my_orders_screen.dart';
import 'package:flutter_shukran/screens/payment/create_new_card_screen.dart';
import 'package:flutter_shukran/screens/payment/credit_card_list.dart';
import 'package:flutter_shukran/screens/payment/stripe/existing-cards.dart';
import 'package:flutter_shukran/screens/payment/stripe/stripe_home.dart';
import 'package:flutter_shukran/screens/product_details_screen.dart';
import 'package:flutter_shukran/screens/product_list_screen.dart';
import 'package:flutter_shukran/screens/profile_screen.dart';
import 'package:flutter_shukran/screens/profile_update_screen.dart';
import 'package:flutter_shukran/widgets/products/product_list_widget.dart';
import 'package:flutter_shukran/screens/splash_screen.dart';
import 'package:flutter_shukran/screens/vendor_home_screen.dart';
import 'package:flutter_shukran/screens/welcome_screen.dart';
import 'package:flutter_shukran/widgets/near_by_store.dart';
import 'package:provider/provider.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp();
  runApp(MultiProvider(
    providers: [
      ChangeNotifierProvider(
        create: (_) => AuthProvider(),
      ),
      ChangeNotifierProvider(
        create: (_) => LocationProvider(),
      ),
      ChangeNotifierProvider(
        create: (_) => StoreProvider(),
      ),
      ChangeNotifierProvider(
        create: (_) => CartProvider(),
      ),
      ChangeNotifierProvider(
        create: (_) => CouponProvider(),
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
      debugShowCheckedModeBanner: false,
      initialRoute: SplashScreen.id,
      routes: {
        HomeScreen.id: (context) => HomeScreen(),
        WelcomeScreen.id: (context) => WelcomeScreen(),
        SplashScreen.id: (context) => SplashScreen(),
        MapScreen.id: (context) => MapScreen(),
        LoginScreen.id: (context) => LoginScreen(),
        LandingScreen.id: (context) => LandingScreen(),
        NearByStores.id: (context) => NearByStores(),
        MainScreen.id: (context) => MainScreen(),
        VendorHomeScreen.id: (context) => VendorHomeScreen(),
        ProductListScreen.id: (context) => ProductListScreen(),
        ProductDetailScreen.id: (context) => ProductDetailScreen(),
        CartScreen.id: (context) => CartScreen(),
        ProfileScreen.id: (context) => ProfileScreen(),
        UpdateProfile.id: (context) => UpdateProfile(),
        FavouriteScreen.id: (context) => FavouriteScreen(),
        FavouriteDetailScreen.id: (context) => FavouriteDetailScreen(),
        ExistingCardsPage.id: (context) => ExistingCardsPage(),
        StripeHome.id: (context) => StripeHome(),
        MyOrdersScreen.id: (context) => MyOrdersScreen(),
        CreditCardList.id: (context) => CreditCardList(),
        CreateNewCreditCard.id: (context) => CreateNewCreditCard(),
      },
      builder: EasyLoading.init(),
    );
  }
}
