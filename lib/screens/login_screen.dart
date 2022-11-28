import 'package:email_validator/email_validator.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shukran_vendor/providers/auth_provider.dart';
import 'package:shukran_vendor/screens/home_screen.dart';
import 'package:shukran_vendor/screens/register_screen.dart';
import 'package:shukran_vendor/widgets/reset_password_screen.dart';

class LoginScreen extends StatefulWidget {
  static const String id = 'login_screen';

  @override
  _LoginScreenState createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  final _formKey = GlobalKey<FormState>();
  Icon icon;
  bool _visible = true;
  var _emailController = TextEditingController();
  var _passwordController = TextEditingController();
  String email;
  String password;
  bool _loading = false;

  @override
  Widget build(BuildContext context) {
    final _authData = Provider.of<AuthProvider>(context);

    return SafeArea(
      child: Scaffold(
        body: Form(
          key: _formKey,
          child: Padding(
            padding: const EdgeInsets.all(40.0),
            child: Center(
              child: SingleChildScrollView(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.center,
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    Image.asset(
                      'images/logo.png',
                      height: 100,
                    ),
                    SizedBox(
                      width: 10,
                    ),
                    Text(
                      'LOGIN',
                      style: TextStyle(fontFamily: 'Lato', fontSize: 25),
                    ),
                    SizedBox(
                      height: 20,
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
                    TextFormField(
                      validator: (value) {
                        if (value.isEmpty) {
                          return 'Enter Password';
                        }
                        if (value.length < 6) {
                          return 'Password Must be of 6 Characters';
                        }
                        setState(() {
                          password = value;
                        });
                        return null;
                      },
                      obscureText: _visible == false ? true : false,
                      decoration: InputDecoration(
                        suffixIcon: IconButton(
                          icon: _visible
                              ? Icon(Icons.visibility)
                              : Icon(Icons.visibility_off),
                          onPressed: () {
                            setState(() {
                              _visible = !_visible;
                            });
                          },
                        ),
                        enabledBorder: OutlineInputBorder(),
                        contentPadding: EdgeInsets.zero,
                        hintText: 'Password',
                        prefixIcon: Icon(Icons.vpn_key_outlined),
                        focusedBorder: OutlineInputBorder(
                          borderSide:
                              BorderSide(color: Colors.blueAccent, width: 2),
                        ),
                        focusColor: Colors.blueAccent,
                      ),
                    ),
                    SizedBox(
                      height: 10,
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.end,
                      children: [
                        InkWell(
                          onTap: () {
                            Navigator.pushNamed(context, ResetPassword.id);
                          },
                          child: Text(
                            'Forgot Password?',
                            textAlign: TextAlign.end,
                            style: TextStyle(
                                color: Colors.grey,
                                fontWeight: FontWeight.bold),
                          ),
                        ),
                      ],
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
                                _authData
                                    .loginVendor(email, password)
                                    .then((credential) {
                                  if (credential != null) {
                                    setState(() {
                                      _loading = false;
                                    });
                                    Navigator.pushReplacementNamed(
                                        context, HomeScreen.id);
                                  } else {
                                    ScaffoldMessenger.of(context).showSnackBar(
                                        SnackBar(
                                            content: Text(_authData.error)));
                                  }
                                });
                              }
                            },
                            child: _loading
                                ? LinearProgressIndicator(
                                    valueColor: AlwaysStoppedAnimation<Color>(
                                        Colors.white),
                                    backgroundColor: Colors.transparent,
                                  )
                                : Text(
                                    'LOGIN',
                                    style: TextStyle(
                                        fontFamily: 'Lato',
                                        color: Colors.white),
                                  ),
                          ),
                        ),
                      ],
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        FlatButton(
                          child: RichText(
                            text: TextSpan(text: '', children: [
                              TextSpan(
                                  text: 'Don\'t have an account ?',
                                  style: TextStyle(color: Colors.black)),
                              TextSpan(
                                  text: 'Register',
                                  style: TextStyle(
                                      fontWeight: FontWeight.bold,
                                      color: Colors.red)),
                            ]),
                          ),
                          onPressed: () {
                            Navigator.pushReplacementNamed(
                                context, RegisterScreen.id);
                          },
                        ),
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
