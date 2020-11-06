<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index(){
    	$data = [
    		'msg' => 'hello'
    	];
    	return view('mypage.index', $data);
    }

    public function formmethod(MyRequest $request){
    	
    }
}