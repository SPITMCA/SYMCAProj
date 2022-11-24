import 'package:firebase_core/firebase_core.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:provider/provider.dart';
import 'package:shukrann_delivery_boy/providers/auth_provider.dart';
import 'package:shukrann_delivery_boy/screens/home_screen.dart';
import 'package:shukrann_delivery_boy/screens/login_screen.dart';
import 'package:shukrann_delivery_boy/screens/register_screen.dart';
import 'package:shukrann_delivery_boy/screens/reset_password_screen.dart';
import 'package:shukrann_delivery_boy/screens/splash_screen.dart';

void main() async {
  Provider.debugCheckInvalidValueType = null;
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp();
  runApp(MultiProvider(
    providers: [
      ChangeNotifierProvider(
        create: (_) => AuthProvider(),
      ),
    ],
    child: MyApp(),
  ));
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Shukrann Delivery',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      initialRoute: SplashScreen.id,
      routes: {
        SplashScreen.id: (context) => SplashScreen(),
        HomeScreen.id: (context) => HomeScreen(),
        LoginScreen.id: (context) => LoginScreen(),
        ResetPassword.id: (context) => ResetPassword(),
        RegisterScreen.id: (context) => RegisterScreen(),
      },
      builder: EasyLoading.init(),
    );
  }
}
