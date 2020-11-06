<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MypageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == 'mypage'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric'
        ];
    }

    public function messages(){
        return [
            'name.required' => '名前を入れて下さい。',
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '数字を入れて下さい'
        ];
    }
}
