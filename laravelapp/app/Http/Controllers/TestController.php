<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(Request $request){
		$id = filter_input(INPUT_POST, 'id');
		$list = array("id" => $id, "name" => "お名前", "hoge" => "ほげ" );
		header("Content-type: application/json; charset=UTF-8");
		$returnlist = [
			'returnlist' => json_encode($list)
		];
    	return view('test', $returnlist);
    }
    public function formmethod(Request $request){
    	return view('test');
    }
}
