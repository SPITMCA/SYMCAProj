import 'package:cloud_firestore/cloud_firestore.dart';

class ProductServices {
  CollectionReference category =
      FirebaseFirestore.instance.collection('category');
  CollectionReference products =
      FirebaseFirestore.instance.collection('products');
  CollectionReference favourites =
      FirebaseFirestore.instance.collection('favourites');

  Future<void> deleteFavourites({id}) {
    return favourites.doc(id).delete();
  }
}
