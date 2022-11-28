import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:shukran_vendor/services/firebase_services.dart';

class ProductBannerCard extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    FireBaseServices _services = FireBaseServices();
    return StreamBuilder<QuerySnapshot>(
      stream: _services.productBanner.snapshots(),
      builder: (BuildContext context, AsyncSnapshot<QuerySnapshot> snapshot) {
        if (snapshot.hasError) {
          return Text('Something went wrong');
        }

        if (snapshot.connectionState == ConnectionState.waiting) {
          return Text("Loading");
        }

        return Container(
          height: 200,
          width: MediaQuery.of(context).size.width,
          child: ListView(
            scrollDirection: Axis.horizontal,
            children: snapshot.data.docs.map((DocumentSnapshot document) {
              Map<String, dynamic> data =
                  document.data() as Map<String, dynamic>;
              return SizedBox(
                height: 150,
                width: MediaQuery.of(context).size.width,
                child: Stack(
                  children: [
                    SizedBox(
                      height: 200,
                      width: MediaQuery.of(context).size.width,
                      child: Card(
                        child: Image.network(
                          document['imageUrl'],
                          fit: BoxFit.contain,
                        ),
                      ),
                    ),
                    Positioned(
                      right: 10,
                      top: 10,
                      child: CircleAvatar(
                        backgroundColor: Colors.red,
                        foregroundColor: Colors.white,
                        child: IconButton(
                          icon: Icon(Icons.delete),
                          onPressed: () {
                            EasyLoading.show(status: 'Deleting...');
                            _services.deleteProductBanner(id: document.id);
                            EasyLoading.dismiss();
                          },
                        ),
                      ),
                    )
                  ],
                ),
              );
            }).toList(),
          ),
        );
      },
    );
  }
}
