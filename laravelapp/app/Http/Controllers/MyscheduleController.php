<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MyscheduleController extends Controller
{
    public function __construct(){
        $this->date = $_GET['scheduletime'];
        $this->nextdate = date("Y-m-d",strtotime($this->date . '+ 1day'));

        $this->selectquery = 'select * from userschedule where id = 20 and schedulestarttime between "'.$this->date.'" and "'.strval($this->nextdate).'"';

        $this->databasedata = DB::select($this->selectquery);
    }

    public function index(Request $request){

        $schedulecats = ['-', '会議', '面談', '来客'];

        $timeparam1 = 
        [
            '-' => '-',
            '09' => '09',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
            '19' => '19',
            '20' => '20',
            '21' => '21',
            '22' => '22',
            '23' => '23'
        ];

        $timeparam2 = 
        [
            '-' => '-',
            '00' => '00',
            '05' => '05',
            '10' => '10',
            '15' => '15',
            '20' => '20',
            '25' => '25',
            '30' => '30',
            '35' => '35',
            '40' => '40',
            '45' => '45',
            '50' => '50',
            '55' => '55'
        ];

        $senddata['senddata']['schedulecats'] = $schedulecats;
        $senddata['senddata']['timeparam1'] = $timeparam1;
        $senddata['senddata']['timeparam2'] = $timeparam2;

    	if(!empty($_GET['scheduletime'])){
            $senddata['senddata']['dateparam'] = $_GET['scheduletime'];
    	}else{
            $senddata['senddata']['dateparam'] = '';
    	}
    	/*日付のテーブルに格納されたスケジュールのデータを取り出す処理*/
        if(!empty($this->databasedata)){
            $senddata['senddata']['scheduledata'] = $this->databasedata;
        }else{
            $senddata['senddata']['scheduledata'] = [''];
        }
    	/*日付のテーブルに格納されたスケジュールのデータを取り出す処理*/
    	
    	return view('mypage.myschedule', $senddata);
    }

    public function formmethod(Request $request){
    	/*日付のデータを更新または追加する処理*/
        $date = $_GET['scheduletime'];
        $starttime = $date.' '.$request->scheduletime1_1.':'.$request->scheduletime1_2;
        $endtime = $date.' '.$request->scheduletime2_1.':'.$request->scheduletime2_2;

        /*スケジュールを追加する時*/
        $param = [
            'id' => 20, 
            'name' => 'yuyamita',
            'schedulecat' => $request->schedulecats,
            'schedulestarttime' => $starttime,
            'scheduleendtime' => $endtime,
            'schedulememo' => $request->schedulememo,
            'uniqueid' => $request->uniqueid
        ];
        
        if($request->schedulecats != '-' && $request->scheduletime1_1 != '-' && $request->scheduletime1_2 != '-' && $request->scheduletime2_1 != '-' && $request->scheduletime2_2 != '-' && $request->schedulememo != '-'){
            DB::insert(
                'insert into userschedule
                (id, name, schedulecat, schedulestarttime, scheduleendtime, schedulememo, uniqueid) 
                values 
                (:id, :name, :schedulecat, :schedulestarttime, :scheduleendtime, :schedulememo, :uniqueid)',
                $param
            );
        }
        /*スケジュールを追加する時*/

        /*スケジュールを更新する時*/
        /*スケジュールを更新する時*/

    	/*日付のデータを更新または追加する処理*/
        redirect('myschedule?scheduletime=2020-11-10');
    }
}