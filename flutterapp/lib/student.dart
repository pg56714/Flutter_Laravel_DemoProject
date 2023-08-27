import 'dart:convert';

import 'package:http/http.dart' as http;

class Student{
  String baseUrl = "http://10.0.2.2:8000/api/student"; 
  Future<List> getAllStudent(String id) async{
    try{
      var response = await http.get(Uri.parse(baseUrl));
      //var response = await http.get(Uri.parse(baseUrl + '/$id'));
      print(response.request);
      if(response.statusCode == 200){
        return jsonDecode(response.body);
      }else{
        return Future.error("Server Error");
      }
    }catch(e) {
      return Future.error(e);
    }
  }
}