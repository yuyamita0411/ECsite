<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\MypageMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('mypage', 'MypageController@index')->middleware(MypageMiddleware::class);
Route::get('mypage', 'MypageController@index')->middleware('mypage');
Route::post('mypage', 'MypageController@formmethod')->middleware('mypage');