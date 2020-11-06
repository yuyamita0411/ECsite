<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    public function index(){
    	$test = [];
    	return view('test.index', $test);
    }
}
