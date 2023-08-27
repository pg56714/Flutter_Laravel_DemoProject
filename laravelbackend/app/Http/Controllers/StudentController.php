<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Validator;

class StudentController extends Controller
{
    // 查全部
    public function index()
    {
        return Student::all();
        //return ['id' => '1'];
    }
    /*
    // 利用id欄位做查詢
    public function index1($id){
        return Student::find($id);
    }
    */

    // 利用id以外的資料欄位做查詢
    public function index2($stu_id)
    {
        //return Student::find($stuname);
        //return Student::where('stuname', 'like', '%'.$stuname.'%')->get();
        return Student::where('stu_id', $stu_id)->get();
    }

    /*
    // 利用id以外的資料欄位做查詢
    public function index2($stuname){
        //return Student::find($stuname);
        //return Student::where('stuname', 'like', '%'.$stuname.'%')->get();
        return Student::where('stuname', $stuname)->get();
    }
    */

    // 新增資料
    public function add(Request $req)
    {
        $student = new Student;
        $student->stu_id = $req->stu_id;
        $student->password = $req->password;
        $result = $student->save();
        if ($result) {
            return ['Result' => 'Data has been saved'];
        } else {
            return ['Result' => 'Error'];
        }
    }

    // 修改資料
    public function update(Request $req)
    {
        $student = Student::find($req->id);
        $student->stu_id = $req->stu_id;
        $student->password = $req->password;
        $result = $student->save();
        if ($result) {
            return ['Result' => 'Data is updated'];
        } else {
            return ['Result' => 'Error'];
        }
    }


    // 刪除資料
    public function delete($id)
    {
        $student = Student::find($id);
        $result = $student->delete();
        if ($result) {
            return ['Result' => 'Record has been delete ' . $id];
        } else {
            return ['Result' => 'Error'];
        }
    }

    // 驗證資料
    /*
    public function testData(Request $req){
        $rules=array(
            'email' => 'required|email'
            //'email' => 'required|min:2|max:20'
            //'email' => 'required'
        );
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            //return $validator->errors();
            return response()->json($validator->errors(),401);
        }else{
            // 驗證正確可以新增資料
            return ['x' => 'y'];
            /*
            $student = new Student;
            $student ->stuname = $req -> stuname;
            $student ->email = $req -> email;
            $result = $student -> save();
            if($result){
                return ['Result' => 'Data has been saved'];
            }else{
                return ['Result' => 'Error'];
            }
            */
    // }

    //}

}
