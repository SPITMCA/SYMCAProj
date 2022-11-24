import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/store_providers.dart';
import 'package:flutter_shukran/services/product_service.dart';
import 'package:provider/provider.dart';

class ProductFilterWidget extends StatefulWidget {
  @override
  _ProductFilterWidgetState createState() => _ProductFilterWidgetState();
}

class _ProductFilterWidgetState extends State<ProductFilterWidget> {
  List _subCatList = [];
  ProductServices _services = ProductServices();

  @override
  void didChangeDependencies() {
    var _store = Provider.of<StoreProvider>(context);

    FirebaseFirestore.instance
        .collection('products')
        .where('categoryName.mainCategory',
            isEqualTo: _store.selectedProductCategory)
        .get()
        .then((QuerySnapshot querySnapshot) {
      querySnapshot.docs.forEach((doc) {
        if (mounted) {
          setState(() {
            _subCatList.add(doc['categoryName']['subCategory']);
          });
        }
      });
    });

    super.didChangeDependencies();
  }

  @override
  Widget build(BuildContext context) {
    var _storeData = Provider.of<StoreProvider>(context);

    return FutureBuilder<DocumentSnapshot>(
      future: _services.category.doc(_storeData.selectedProductCategory).get(),
      builder:
          (BuildContext context, AsyncSnapshot<DocumentSnapshot> snapshot) {
        if (snapshot.hasError) {
          return Text("Something went wrong");
        }
        if (!snapshot.hasData) {
          return Container();
        }

        Map<String, dynamic> data =
            snapshot.data.data() as Map<String, dynamic>;

        return Container(
          height: 45,
          color: Colors.blueAccent,
          child: ListView(
            scrollDirection: Axis.horizontal,
            children: [
              SizedBox(width: 10),
              ActionChip(
                shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(4)),
                elevation: 4,
                backgroundColor: Colors.white,
                label: Text('All ${_storeData.selectedProductCategory}'),
                onPressed: () {
                  _storeData
                      .selectedCategorySub(null); // this will remove filter
                },
              ),
              ListView.builder(
                shrinkWrap: true,
                scrollDirection: Axis.horizontal,
                physics: ScrollPhysics(),
                itemCount: data['subCat'].length,
                itemBuilder: (BuildContext context, int index) {
                  return Padding(
                    padding: const EdgeInsets.only(left: 10),
                    child: _subCatList.contains(data['subCat'][index]['name'])
                        ? ActionChip(
                            shape: RoundedRectangleBorder(
                                borderRadius: BorderRadius.circular(4)),
                            elevation: 4,
                            backgroundColor: Colors.white,
                            label: Text(
                              data['subCat'][index]['name'],
                            ),
                            onPressed: () {
                              _storeData.selectedCategorySub(
                                  data['subCat'][index]['name']);
                            },
                          )
                        : Container(),
                  );
                },
              )
            ],
          ),
        );
      },
    );
  }
}
