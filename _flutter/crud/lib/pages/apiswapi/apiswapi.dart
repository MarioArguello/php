import 'package:crud/pages/models/swaper.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter/src/widgets/placeholder.dart';
import 'package:get/get.dart';

import 'apiswapi_Controller.dart';

class Principal extends StatelessWidget {
  apiswapiController con = Get.put(apiswapiController());
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Lista de usuarios'),
        automaticallyImplyLeading: false,
        backgroundColor: Colors.amber,
      ),
      body: FutureBuilder(
        future: con.getSwapi(),
        builder: (context, snapshot) {
          if (snapshot.hasData) {
            return _card2(snapshot.data!);
          } else {
            return Container();
          }
        },
      ),
    );
  }

  Widget _card2(Swapi swapi) {
    print(' name : ${swapi.name ?? ''}');
    return ListTile(
      leading: Icon(Icons.person),
      title: Text(swapi.eyeColor ?? ""),
      subtitle: Text(swapi.name ?? ''),
    );
  }
}
