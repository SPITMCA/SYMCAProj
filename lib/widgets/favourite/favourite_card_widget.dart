import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/screens/favourite_detail_screen.dart';
import 'package:flutter_shukran/screens/product_details_screen.dart';
import 'package:flutter_shukran/services/product_service.dart';
import 'package:flutter_shukran/widgets/cart/counter.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';

class FavouriteCard extends StatelessWidget {
  final DocumentSnapshot document;
  FavouriteCard(this.document);

  @override
  Widget build(BuildContext context) {
    ProductServices _services = ProductServices();
    String offer =
        ((document['product']['comparedPrice'] - document['product']['price']) /
                document['product']['comparedPrice'] *
                100)
            .toStringAsFixed(0);
    return Container(
      height: 160,
      decoration: BoxDecoration(
        border: Border(
          bottom: BorderSide(width: 1, color: Colors.grey.shade300),
        ),
      ),
      width: MediaQuery.of(context).size.width,
      child: Padding(
        padding: const EdgeInsets.only(top: 8, bottom: 8, left: 10, right: 10),
        child: Row(
          children: [
            Stack(
              children: [
                Material(
                  elevation: 5,
                  borderRadius: BorderRadius.circular(10),
                  child: InkWell(
                    onTap: () {
                      pushNewScreenWithRouteSettings(
                        context,
                        settings: RouteSettings(name: FavouriteDetailScreen.id),
                        screen: FavouriteDetailScreen(document: document),
                        withNavBar: false,
                        pageTransitionAnimation:
                            PageTransitionAnimation.cupertino,
                      );
                    },
                    child: SizedBox(
                      height: 140,
                      width: 130,
                      child: ClipRRect(
                        borderRadius: BorderRadius.circular(10),
                        child: Hero(
                            tag: document['product']['productName'],
                            child: Image.network(
                                document['product']['productImage'])),
                      ),
                    ),
                  ),
                ),
                if (document['product']['comparedPrice'] >
                    0) //it will show only offer available
                  Container(
                    decoration: BoxDecoration(
                      color: Colors.blueAccent,
                      borderRadius: BorderRadius.only(
                        topLeft: Radius.circular(6),
                        bottomRight: Radius.circular(6),
                      ),
                    ),
                    child: Padding(
                      padding: const EdgeInsets.only(
                          left: 10, right: 10, top: 3, bottom: 3),
                      child: Text(
                        '$offer %OFF',
                        style: TextStyle(color: Colors.white, fontSize: 12),
                      ),
                    ),
                  )
              ],
            ),
            Padding(
              padding: const EdgeInsets.only(top: 5, left: 8),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Text(
                    document['product']['brand'],
                    style: TextStyle(fontSize: 10),
                  ),
                  SizedBox(height: 10),
                  Flexible(
                    child: Text(
                      document['product']['productName'],
                      style:
                          TextStyle(fontWeight: FontWeight.bold, fontSize: 13),
                      softWrap: true,
                      overflow: TextOverflow.fade,
                    ),
                  ),
                  SizedBox(height: 10),
                  Row(
                    children: [
                      Text(
                        '₹${document['product']['price']}',
                        style: TextStyle(fontWeight: FontWeight.bold),
                      ),
                      SizedBox(width: 5),
                      if (document['product']['comparedPrice'] >
                          0) // only show if it has value or more than 0.
                        Text(
                          '₹${document['product']['comparedPrice']}',
                          style: TextStyle(
                              decoration: TextDecoration.lineThrough,
                              color: Colors.grey,
                              fontSize: 12),
                        ),
                    ],
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.end,
                    children: [
                      Container(
                        width: MediaQuery.of(context).size.width - 160,
                        child: Row(
                          mainAxisAlignment: MainAxisAlignment.end,
                          children: [
                            CircleAvatar(
                              backgroundColor: Colors.white,
                              child: IconButton(
                                  icon: Icon(
                                    Icons.delete,
                                    color: Colors.redAccent,
                                  ),
                                  onPressed: () {
                                    _services.deleteFavourites(id: document.id);
                                  }),
                            ),
                          ],
                        ),
                      )
                    ],
                  )
                ],
              ),
            )
          ],
        ),
      ),
    );
  }
}
