<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MypageRequest;
use Validator;

class MypageController extends Controller
{
    //
    public function index(Request $request){
        $validator = Validator::make($request->query(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150'
        ]);

        if ($validator->fails()) {
            $msg = $request->fail;
        }else{
            $msg = $request->success;
        }
        return view('mypage.index', ['msg' => $msg]);
    }

    public function formmethod(MypageRequest $request){
        /*同じこと*/
        /*①
        $validation_rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150'
        ];        
        $this->validate($request, $validation_rules);
        
        ②
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150'
        ]);*/
        /*同じこと*/

        /*↓↓↓↓↓↓コントローラーでバリデーションを設定する場合↓↓↓↓↓↓*/
        /*$rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150'
        ];

        $messages = [
            'name.required' => '名前は必ず入力してください。',
            'mail.email' => 'メールアドレスが正しくありません。',
            'age.between' => '数字を入れて下さい。'
        ];*/

        /*$validator = Validator::make($request->query(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150'
        ]);*/

        /*$validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect('/')->withErrors($validator)->withInput();
        }*/
        /*↑↑↑↑↑↑コントローラーでバリデーションを設定する場合↑↑↑↑↑↑*/
        /*$validator = Validator::make($request->query(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150'
        ]);
        if ($validator->fails()) {
            $msg = $request->fail;
        }else{
            $msg = $request->success;
        }*/

        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => ['numeric', new Myrule(5)]
        ];
        $messages = [
            'name.required' => '名前を入れて下さい。',
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '数字を入れて下さい'
        ];    

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $msg = $request->fail;

            return redirect('/mypage')->withErrors($validator)->withInput();
        }else{
            $msg = $request->success;
        }

        return view('mypage.index', ['msg' => $msg]);
    }

}