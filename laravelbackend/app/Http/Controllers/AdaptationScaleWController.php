<?php

namespace App\Http\Controllers;
use App\Models\adaptation_scale_w;
use Illuminate\Http\Request;

class AdaptationScaleWController extends Controller
{
    //
    public function index(){
        return adaptation_scale_w::all();
    }

    // 新增資料
    public function add(Request $req){
        $data = $req->input();
        foreach($data['adaptation_scale_ws'] as $key => $value){
            $adaptation = new adaptation_scale_w;
            $adaptation->w_scale_id = $value['w_scale_id'];
            $adaptation->user_id = $value['user_id'];
            $adaptation->q1 = $value['q1'];
            $adaptation->q2 = $value['q2'];
            $adaptation->q3 = $value['q3'];
            $adaptation->q4 = $value['q4'];
            $adaptation->q5 = $value['q5'];
            $adaptation->q6 = $value['q6'];
            $adaptation->q7 = $value['q7'];
            $adaptation->q8 = $value['q8'];
            $adaptation->q9 = $value['q9'];
            $adaptation->q10 = $value['q10'];
            $adaptation->write_datetime = $value['write_datetime'];
            $adaptation -> save(); 
        }
        return response() -> json(['message'=>'Data has been saved']);

        
        /*
        $adaptation = new adaptation_scale_w;
        $adaptation ->w_scale_id = $req -> w_scale_id;
        $adaptation ->user_id = $req -> user_id;
        $adaptation ->q1 = $req -> q1;
        $adaptation ->q2 = $req -> q2;
        $adaptation ->q3 = $req -> q3;
        $adaptation ->q4 = $req -> q4;
        $adaptation ->q5 = $req -> q5;
        $adaptation ->q6 = $req -> q6;
        $adaptation ->q7 = $req -> q7;
        $adaptation ->q8 = $req -> q8;
        $adaptation ->q9 = $req -> q9;
        $adaptation ->q10 = $req -> q10;
        $adaptation ->write_datetime = $req -> write_datetime;
        $result = $adaptation -> save();
        if($result){
            return ['Result' => 'Data has been saved'];
        }else{
            return ['Result' => 'Error'];
        }
        */
    }
}
