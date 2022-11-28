import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_shukran/providers/store_providers.dart';
import 'package:flutter_shukran/widgets/category_widget.dart';
import 'package:flutter_shukran/widgets/image_slider.dart';
import 'package:flutter_shukran/widgets/my_app_bar.dart';
import 'package:flutter_shukran/widgets/product_banner.dart';
import 'package:flutter_shukran/widgets/products/best_selling_procducts.dart';
import 'package:flutter_shukran/widgets/products/featured_products.dart';
import 'package:flutter_shukran/widgets/products/recently_added_products.dart';
import 'package:flutter_shukran/widgets/vendor_app_bar.dart';
import 'package:flutter_shukran/widgets/vendor_banner.dart';
import 'package:provider/provider.dart';

class VendorHomeScreen extends StatelessWidget {
  static const String id = 'vendor_home_screen';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: NestedScrollView(
        headerSliverBuilder: (BuildContext context, bool innerBoxIsScrolled) {
          return [
            VendorAppBar(),
          ];
        },
        body: ListView(
          physics: NeverScrollableScrollPhysics(),
          shrinkWrap: true,
          children: [
            VendorBanner(),
            VendorsCategories(),
            ProductBanner(),
            RecentlyAddedProducts(),
            ProductBanner(),
            FeaturedProducts(),
            ProductBanner(),
            BestSellingProducts(),
            SizedBox(
              height: 80,
            )
          ],
        ),
      ),
    );
  }
}
