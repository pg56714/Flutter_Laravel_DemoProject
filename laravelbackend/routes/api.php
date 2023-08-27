<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdaptationScaleWController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    // All secure URL's
    // Public Routes
    Route::get('/student', [StudentController::class, 'index']);

    // 加入id欄位做查詢
    Route::get('/student/{id}', [StudentController::class, 'index1'])->where('id', '[0-9]+');

    // 加入id欄位做查詢
    Route::get('/student/{stuname}', [StudentController::class, 'index2']);

    // 新增
    Route::post('/add', [StudentController::class, 'add']);

    // 修改
    Route::put('/update', [StudentController::class, 'update']);

    // 刪除
    Route::delete('/delete/{id}', [StudentController::class, 'delete']);

    Route::post('/save', [StudentController::class, 'testData']);

    //Route::get('/AdaptationScale', [AdaptationScaleWController::class, 'index']);

    Route::post('/AdaptationScale/add', [AdaptationScaleWController::class, 'add']);
});


Route::post("/login",[UserController::class,'index']);

    // Public Routes
    //Route::get('/student', [StudentController::class, 'index']);

    // 加入id欄位做查詢
    //Route::get('/student/{id}', [StudentController::class, 'index1'])->where('id', '[0-9]+');

    // 加入id欄位做查詢
    //Route::get('/student/{stu_id}', [StudentController::class, 'index2']);

    // 新增
    //Route::post('/add', [StudentController::class, 'add']);

    // 修改
    //Route::put('/update', [StudentController::class, 'update']);

    // 刪除
    //Route::delete('/delete/{id}', [StudentController::class, 'delete']);

    //Route::post('/save', [StudentController::class, 'testData']);
    Route::get('/AdaptationScale', [AdaptationScaleWController::class, 'index']);