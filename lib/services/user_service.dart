import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter_shukran/models/user_model.dart';

class UserServices {
  String collection = 'users';
  FirebaseFirestore _firestore = FirebaseFirestore.instance;

  //create User data
  Future<void> createUser(Map<String, dynamic> values) async {
    String id = values['id'];
    await _firestore.collection(collection).doc(id).set(values);
  }

  //update User data
  Future<void> updateUser(Map<String, dynamic> values) async {
    String id = values['id'];
    await _firestore.collection(collection).doc(id).update(values);
  }

  //get User By Id

  Future<DocumentSnapshot> getUserById(String id) async {
    var result = await _firestore.collection(collection).doc(id).get();

    return result;
  }
}
