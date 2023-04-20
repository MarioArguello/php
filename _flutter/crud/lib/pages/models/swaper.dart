// To parse this JSON data, do
//
//     final swapi = swapiFromJson(jsonString);

import 'dart:convert';

Swapi swapiFromJson(String str) => Swapi.fromJson(json.decode(str));

String swapiToJson(Swapi data) => json.encode(data.toJson());

class Swapi {
  String? name;
  String? height;
  String? mass;
  String? hairColor;
  String? skinColor;
  String? eyeColor;
  String? birthYear;
  String? gender;
  String? homeworld;

  Swapi({
    this.name,
    this.height,
    this.mass,
    this.hairColor,
    this.skinColor,
    this.eyeColor,
    this.birthYear,
    this.gender,
    this.homeworld,
  });

  factory Swapi.fromJson(Map<String, dynamic> json) => Swapi(
        name: json["name"],
        height: json["height"],
        mass: json["mass"],
        hairColor: json["hair_color"],
        skinColor: json["skin_color"],
        eyeColor: json["eye_color"],
        birthYear: json["birth_year"],
        gender: json["gender"],
        homeworld: json["homeworld"],
      );

  static List<Swapi> fronJsonList(List<dynamic> jsonList) {
    List<Swapi> toList = [];
    jsonList.forEach((element) {
      Swapi swapi = Swapi.fromJson(element);
      toList.add(swapi);
    });
    return toList;
  }

  Map<String, dynamic> toJson() => {
        "name": name,
        "height": height,
        "mass": mass,
        "hair_color": hairColor,
        "skin_color": skinColor,
        "eye_color": eyeColor,
        "birth_year": birthYear,
        "gender": gender,
        "homeworld": homeworld,
      };
}
