<?php

namespace App\Providers;

use Illuminate\Support\Facades\view;
use Illuminate\Support\ServiceProvider;

use Validator;
use App\Http\Validators\MypageValidator;

class MypageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /*view::composer(
            'mypage.index', 'App\Http\composer\MypageComposer'
        );*/
        $validator = $this->app['validator'];
        $validator->resolver(function($translator, $data, $rules, $messages){
        	return new MypageValidator($translator, $data, $rules, $messages);
        });

    /*Validator::extend('mypage', function($attribute, $value, $parameters, $validator){
        return $value % 2 == 0;
    });*/
    }
}
