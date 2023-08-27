<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function index(Request $request)
    {
        $user= User::where('parent_id', $request->parent_id)->where('password', $request->password)->first();

        $user1= Student::where('stu_id', $request->stu_id)->where('password', $request->password)->first();

        // 登入
        if($user){
            // 每次進入都新增token，並刪除舊token確保資料不外洩
            // 刪除舊token
            $user->tokens()->delete();
            // 新增新token
            $token = $user->createToken('my-app-token')->plainTextToken;
            
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
            return response($response, 201);
        }elseif($user1){
            // 每次進入都新增token，並刪除舊token確保資料不外洩
            // 刪除舊token
            $user1->tokens()->delete();
            // 新增新token
            $token = $user1->createToken('my-app-token')->plainTextToken;
            
            $response = [
                'user' => $user1,
                'token' => $token
            ];
        
            return response($response, 201);
        }else{
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        /*
        $user= User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }else{
            // 每次進入都新增token，並刪除舊token確保資料不外洩
            // 刪除舊token
            $user->tokens()->delete();
            // 新增新token
            $token = $user->createToken('my-app-token')->plainTextToken;
            
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
            return response($response, 201);
        }  
        */
    }
}
