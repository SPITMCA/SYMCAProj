import 'package:carousel_slider/carousel_slider.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:dots_indicator/dots_indicator.dart';
import 'package:flutter/material.dart';

class AdSlider extends StatefulWidget {
  const AdSlider({Key key}) : super(key: key);

  @override
  _AdSliderState createState() => _AdSliderState();
}

class _AdSliderState extends State<AdSlider> {
  int _index = 0;
  int _dataLength = 1;

  Future getSliderFromDb() async {
    var _fireStore = FirebaseFirestore.instance;
    QuerySnapshot snapshot =
        await _fireStore.collection('additionalBanners').get();
    if (mounted) {
      setState(() {
        _dataLength = snapshot.docs.length;
      });
    }
    return snapshot.docs;
  }

  @override
  void initState() {
    getSliderFromDb();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      child: Column(
        children: [
          if (_dataLength != 0)
            FutureBuilder(
              future: getSliderFromDb(),
              builder: (_, snapShot) {
                return snapShot.data == null
                    ? Center(
                        child: CircularProgressIndicator(),
                      )
                    : Padding(
                        padding: const EdgeInsets.only(top: 4),
                        child: CarouselSlider.builder(
                          itemCount: snapShot.data.length,
                          itemBuilder: (BuildContext context, int index, int) {
                            DocumentSnapshot sliderImage = snapShot.data[index];
                            Map getImage = sliderImage.data();
                            return SizedBox(
                              width: MediaQuery.of(context).size.width,
                              child: Image.network(
                                getImage['image'],
                                fit: BoxFit.fill,
                              ),
                            );
                          },
                          options: CarouselOptions(
                              viewportFraction: 1,
                              initialPage: 0,
                              autoPlay: true,
                              height: 200,
                              onPageChanged:
                                  (int i, carouselPageChangedReason) {
                                setState(() {
                                  _index = i;
                                });
                              }),
                        ),
                      );
              },
            ),
          if (_dataLength != 0)
            DotsIndicator(
              dotsCount: _dataLength,
              position: _index.toDouble(),
              decorator: DotsDecorator(
                size: const Size.square(9.0),
                activeSize: const Size(18.0, 5.0),
                activeShape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(5.0)),
                activeColor: Colors.blueAccent,
              ),
            ),
        ],
      ),
    );
  }
}
