import 'package:crud/pages/models/swaper.dart';
import 'package:get/get.dart';

import '../provider/provider_swapi.dart';

class apiswapiController extends GetxController {
  providerSwapi prSwapi = providerSwapi();
  Future<Swapi> getSwapi() async {
    return await prSwapi.getSwapi();
  }
}
