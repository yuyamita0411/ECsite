<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginpageRequest;

use Validator;

use Illuminate\Support\Facades\DB;

class LoginpageController extends Controller
{
    //
    public function __construct(){
    }

    public function index(Request $request){
    	return view('mypage.login');
    }

    public function formmethod(LoginpageRequest $request){
    	return view('mypage.login');
    }
}