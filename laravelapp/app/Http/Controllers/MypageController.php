<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MypageRequest;

use Validator;

use App\Rules\Mypagerule;

use Illuminate\Support\Facades\DB;

class MypageController extends Controller
{
    public function __construct(){
        $this->dates = date("Y-m-d");//今日の日付
        $this->year = date("Y");//年
        $this->month = date("m");//月
        $this->date = date("d");//日
    }

    public function calenderinfo($interval){
        $appendinterval1 = '-'.strval($interval).' day';
        $appendinterval2 = '+'.strval($interval).' day';

        if(!empty($_GET['date'])){
            $dateparam = $_GET['date'];
            $datearr = explode('~', $dateparam);

            $startdate = $datearr[0];
            $enddate = $datearr[1];

            $prevstartdate = date("Y-m-d",strtotime($startdate . $appendinterval1));
            $prevenddate = date("Y-m-d",strtotime($enddate. $appendinterval1));
            $nextstartdate = date("Y-m-d",strtotime($startdate . $appendinterval2));
            $nextenddate = date("Y-m-d",strtotime($enddate. $appendinterval2));
        }else{
            $startdate = $this->dates;
            $enddate = date("Y-m-d",strtotime($startdate. '+ 6day'));

            $prevstartdate = date("Y-m-d",strtotime($this->dates . $appendinterval1));
            $prevenddate = date("Y-m-d",strtotime($prevstartdate. '+ 6day'));
            $nextstartdate = date("Y-m-d",strtotime($this->dates . $appendinterval2));
            $nextenddate = date("Y-m-d",strtotime($nextstartdate. '+ 6day'));
        }

        $button_param_arr = [
            'startdate' => $startdate,
            'enddate' => $enddate,
            'prev' => $prevstartdate.'~'.$prevenddate,
            'next' => $nextstartdate.'~'.$nextenddate
        ];

        return $button_param_arr;
    }

    public function index(Request $request){
        $startdate = self::calenderinfo(1)['startdate'];
        $enddate = self::calenderinfo(1)['enddate'];
        $prev1 = self::calenderinfo(1)['prev'];
        $next1 = self::calenderinfo(1)['next'];
        $prev2 = self::calenderinfo(7)['prev'];
        $next2 = self::calenderinfo(7)['next'];

        $mypageinfoar = [
            'startdate' => $startdate,
            'enddate' => $enddate,
            'prev1' => $prev1,
            'next1' => $next1,
            'prev2' => $prev2,
            'next2' => $next2,
            'schedulearr' => 
            ['9:00~10:00', '10:00~11:00', '11:00~12:00', '12:00~13:00',
            '13:00~14:00', '14:00~15:00', '15:00~16:00', '16:00~17:00',
            '17:00~18:00', '18:00~19:00', '19:00~20:00', '20:00~21:00',
            '21:00~22:00', '22:00~23:00'
            ]
        ];
        return view('mypage.index', $mypageinfoar);
    }

    public function formmethod(Request $request){
        return view('mypage.index');
    }
}