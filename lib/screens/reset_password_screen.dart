import 'package:email_validator/email_validator.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shukrann_delivery_boy/providers/auth_provider.dart';

import 'login_screen.dart';

class ResetPassword extends StatefulWidget {
  static const String id = 'reset_screen';

  @override
  _ResetPasswordState createState() => _ResetPasswordState();
}

class _ResetPasswordState extends State<ResetPassword> {
  var _emailController = TextEditingController();

  String email;
  bool _loading = false;

  @override
  Widget build(BuildContext context) {
    final _authData = Provider.of<AuthProvider>(context);
    final _formKey = GlobalKey<FormState>();
    return SafeArea(
      child: Scaffold(
        body: Form(
          key: _formKey,
          child: Padding(
            padding: const EdgeInsets.all(20.0),
            child: Center(
              child: SingleChildScrollView(
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    Image.asset(
                      'images/forgot.png',
                      height: 180,
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    RichText(
                        text: TextSpan(text: '', children: [
                      TextSpan(
                          text: 'Forgot Your Password  ',
                          style: TextStyle(
                              fontWeight: FontWeight.bold, color: Colors.grey)),
                      TextSpan(
                          text:
                              'Don\'t Worry, provide us your Registered Email,we will send an email to reset your password',
                          style:
                              TextStyle(color: Colors.black54, fontSize: 15)),
                    ])),
                    SizedBox(
                      height: 10,
                    ),
                    TextFormField(
                      controller: _emailController,
                      validator: (value) {
                        if (value.isEmpty) {
                          return 'Enter Email';
                        }
                        final bool _isValid =
                            EmailValidator.validate(_emailController.text);
                        if (!_isValid) {
                          return 'Invalid Email Format';
                        }
                        setState(() {
                          email = value;
                        });
                        return null;
                      },
                      decoration: InputDecoration(
                        enabledBorder: OutlineInputBorder(),
                        contentPadding: EdgeInsets.zero,
                        hintText: 'Email',
                        prefixIcon: Icon(Icons.email_outlined),
                        focusedBorder: OutlineInputBorder(
                          borderSide:
                              BorderSide(color: Colors.blueAccent, width: 2),
                        ),
                        focusColor: Colors.blueAccent,
                      ),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Row(
                      children: [
                        Expanded(
                            child: FlatButton(
                                color: Colors.blueAccent,
                                onPressed: () {
                                  if (_formKey.currentState.validate()) {
                                    setState(() {
                                      _loading = true;
                                    });
                                    _authData.resetPassword(email);
                                    ScaffoldMessenger.of(context).showSnackBar(
                                        SnackBar(
                                            content: Text(
                                                'Email has been Sent to ${_emailController.text} Do check')));
                                  }
                                  Navigator.pushReplacementNamed(
                                      context, LoginScreen.id);
                                },
                                child: _loading
                                    ? LinearProgressIndicator(
                                        valueColor:
                                            AlwaysStoppedAnimation<Color>(
                                                Colors.white),
                                        backgroundColor: Colors.transparent,
                                      )
                                    : Text(
                                        'Reset Password',
                                        style: TextStyle(
                                            color: Colors.white,
                                            fontFamily: 'Lato'),
                                      ))),
                      ],
                    )
                  ],
                ),
              ),
            ),
          ),
        ),
      ),
    );
  }
}
