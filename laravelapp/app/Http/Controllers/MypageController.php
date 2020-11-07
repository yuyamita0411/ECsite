<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MypageRequest;

use Validator;

use App\Rules\Mypagerule;

class MypageController extends Controller
{

	public function __construct(){
		$this->rule = [
            'username' => 'required',
            'password' => 'required',
            'age' => ['numeric', new Mypagerule(5)]
    	];
    	$this->messages = [
            'username.required' => '名前は必ず入力してください。',
            'password.required' => 'パスワードは必ず入力してください。',
            'age.between' => '数字は0~150の間でお願いします。'
    	];
    	$this->successmsg = 'ログインに成功しました';
    	$this->failedmsg = 'ログインに失敗しました';
	}

	public function returnmsg($validator){

        if($validator->fails()){
            $msg = $this->failedmsg;
        }else{
            $msg = $this->successmsg;
        }

    	$returnmsg = ['returnmsg' => $msg];
    	return $returnmsg;
	}

    public function index(Request $request){
    	$validator = Validator::make($request->query(), $this->rule);

    	return view('mypage.index', self::returnmsg($validator));
    }

    public function formmethod(Request $request){
    	$validator = Validator::make($request->all(), $this->rule, $this->messages);

    	if($validator->fails()){
    		return redirect('/mypage')
    		->withErrors($validator)
    		->withInput();
    	}
    	return view('mypage.index', self::returnmsg($validator));
    }
}