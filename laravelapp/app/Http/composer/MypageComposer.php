<?php

namespace App\Http\composer;

use Illuminate\view\view;

class MypageComposer{
	public function compose($view){
		$view->with('view_message', 'this is view '.$view->getName());
	}
}