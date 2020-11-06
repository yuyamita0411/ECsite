<?php
namespace App\Http\Validators;
use Illuminate\Validation\Validator;

class MypageValidator extends Validator{
    public function validateMypage($attribute, $value, $parameters){
        return $value % 2 == 0;
    }
    /*Validator::extend('mypage', function($attribute, $value, $parameters, $validator){
        return $value % 2 == 0;
    });*/
}
?>