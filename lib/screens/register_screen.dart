import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shukrann_delivery_boy/providers/auth_provider.dart';
import 'package:shukrann_delivery_boy/widgets/image_picker.dart';
import 'package:shukrann_delivery_boy/widgets/register_form.dart';

import 'login_screen.dart';

class RegisterScreen extends StatelessWidget {
  static const String id = 'register_screen';

  @override
  Widget build(BuildContext context) {
    final _authData = Provider.of<AuthProvider>(context);
    return SafeArea(
      child: Scaffold(
        body: Center(
          child: Padding(
            padding: const EdgeInsets.all(20.0),
            child: SingleChildScrollView(
              scrollDirection: Axis.vertical,
              child: Column(
                children: [
                  ShopPicCard(),
                  RegisterForm(),
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }
}
