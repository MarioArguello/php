import 'package:get/get.dart';

import '../models/swaper.dart';

class providerSwapi extends GetConnect {
  String url = "https://swapi.dev/api/people/7";
  Future<Swapi> getSwapi() async {
    Response response =
        await get(url, headers: {'Content-Type': 'Application/json'});
    Swapi swapi = Swapi.fromJson(response.body);
    print('url + : ' + url);
    return swapi;
  }
}
