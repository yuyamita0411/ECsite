<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

use App\Rules\RegisterpageRule;

class RegisterpageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() != 'register'){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'username' => ['required', new RegisterpageRule($request->username)],
            'password' => ['required', new RegisterpageRule($request->password)],
            'mailaddress' => ['required', new RegisterpageRule($request->mailaddress)],
            'age' => ['required', new RegisterpageRule($request->age)]
        ];
    }

    public function messages(){
        return [
            'username.required' => '名前は必ず入力してください。',
            'password.required' => 'パスワードは必ず入力してください。',
            'mailaddress.required' => 'メールアドレスは必ず入力してください。',
            'age.required' => '年齢は必ず入力してください。'
        ];
    }

}
