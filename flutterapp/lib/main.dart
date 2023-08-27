import 'package:flutter/material.dart';
import 'package:flutterapp/student.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Connect Flutter with Laravel',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const MyHomePage(title: 'Connect Flutter with Laravel'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({Key? key, required this.title}) : super(key: key);

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {

  final String baseUrl = "http://10.0.2.2:8000/api/student"; 
  getAllStudent(String test) async{
    try{
      if(test.isNotEmpty){
        //var response = await http.get(Uri.parse(baseUrl));
        var response = await http.get(Uri.parse(baseUrl + '/$test'));
          print(response.request);
        if(response.statusCode == 200){
          return jsonDecode(response.body);
        }else{
          return Future.error("Server Error");
        }
      }else{
        var response = await http.get(Uri.parse(baseUrl));
        //var response = await http.get(Uri.parse(baseUrl + '/$test'));
          print(response.request);
        if(response.statusCode == 200){
          return jsonDecode(response.body);
        }else{
          return Future.error("Server Error");
        }
      }
      
    }catch(e) {
      return Future.error(e);
    }
  }

  //Student studentService = Student();
  String test = '';
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Container(
        child: FutureBuilder(
          future: getAllStudent(test),
          builder: (BuildContext context,AsyncSnapshot snapshot){
            print(snapshot.data);
            if(snapshot.hasData){
              return ListView.builder(
                itemCount: snapshot.data?.length,
                itemBuilder: (context, i){
                  print(snapshot.data?.length);
                  return Card(
                    child: ListTile(
                      title: Text(
                        snapshot.data![i]['stuname'],
                        style: TextStyle(fontSize: 30.0),
                      ),
                      subtitle: Text(
                        snapshot.data![i]['email'],
                        style: TextStyle(fontSize: 30.0),
                      ),
                    ),
                  );
                },
              );
            }else{
              return const Center(
                child: Text('No Data Found'),
              );
            }
          },
        ),
      )

    );
  }
}
