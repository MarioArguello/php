import 'package:crud/pages/apiswapi/apiswapi.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatefulWidget {
  const MyApp({super.key});

  @override
  State<MyApp> createState() => _MyWidgetState();
}

class _MyWidgetState extends State<MyApp> {
  @override
  Widget build(BuildContext context) {
    return GetMaterialApp(
      title: 'Get',
      initialRoute: '/',
      getPages: [GetPage(name: '/', page: () => Principal())],
      navigatorKey: Get.key,
    );
  }
}
