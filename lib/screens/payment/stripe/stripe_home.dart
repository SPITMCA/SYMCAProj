import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:flutter_shukran/providers/order_provider.dart';
import 'package:flutter_shukran/screens/payment/create_new_card_screen.dart';
import 'package:flutter_shukran/screens/payment/stripe/existing-cards.dart';
import 'package:flutter_shukran/services/payment/stripe_payment_service.dart';
import 'package:provider/provider.dart';

class StripeHome extends StatefulWidget {
  static const String id = 'stripe_home';
  StripeHome({Key key}) : super(key: key);

  @override
  StripeHomeState createState() => StripeHomeState();
}

class StripeHomeState extends State<StripeHome> {
  onItemPress(BuildContext context, int index, amount, orderProvider) async {
    switch (index) {
      case 0:
        Navigator.pushNamed(context, CreateNewCreditCard.id);
        break;
      case 1:
        payViaNewCard(context, amount, orderProvider);
        break;
      case 2:
        Navigator.pushNamed(context, ExistingCardsPage.id);
        break;
    }
  }

  payViaNewCard(
      BuildContext context, amount, OrderProvider orderProvider) async {
    await EasyLoading.show(status: 'Please Wait');
    var response =
        await StripeService.payWithNewCard(amount: '$amount', currency: 'INR');
    if (response.success == true) {
      orderProvider.success = true;
    }
    await EasyLoading.dismiss();
    ScaffoldMessenger.of(context)
        .showSnackBar(SnackBar(
          content: Text(response.message),
          duration: new Duration(
              milliseconds: response.success == true ? 1200 : 3000),
        ))
        .closed
        .then((_) {
      Navigator.pop(context);
    });
  }

  @override
  void initState() {
    super.initState();
    StripeService.init();
  }

  @override
  Widget build(BuildContext context) {
    ThemeData theme = Theme.of(context);
    final orderProvider = Provider.of<OrderProvider>(context);
    return Scaffold(
      appBar: AppBar(
        centerTitle: true,
        title: Text('Payment'),
      ),
      body: Column(
        children: [
          Padding(
            padding: const EdgeInsets.only(top: 20),
            child: SizedBox(
              height: 56,
              width: MediaQuery.of(context).size.width,
              child: Padding(
                padding: const EdgeInsets.only(left: 40, right: 40, top: 10),
                child: Image.network(
                  'https://stripe.com/img/v3/newsroom/social.png',
                  fit: BoxFit.fitWidth,
                ),
              ),
            ),
          ),
          Material(
            elevation: 4,
            child: Container(
              padding: EdgeInsets.all(20),
              child: ListView.separated(
                  shrinkWrap: true,
                  itemBuilder: (context, index) {
                    Icon icon;
                    Text text;

                    switch (index) {
                      case 0:
                        icon = Icon(Icons.add_circle, color: Colors.blueAccent);
                        text = Text('Add Cards');
                        //TODO: add new cards
                        break;
                      case 1:
                        icon = Icon(Icons.payment_outlined,
                            color: Colors.blueAccent);
                        text = Text('Pay via new card');
                        break;
                      case 2:
                        icon =
                            Icon(Icons.credit_card, color: Colors.blueAccent);
                        text = Text('Pay via existing card');
                        break;
                    }

                    return InkWell(
                      onTap: () {
                        onItemPress(context, index, orderProvider.amount,
                            orderProvider.success);
                      },
                      child: ListTile(
                        title: text,
                        leading: icon,
                      ),
                    );
                  },
                  separatorBuilder: (context, index) => Divider(
                        color: theme.primaryColor,
                      ),
                  itemCount: 3),
            ),
          ),
        ],
      ),
    );
    ;
  }
}
