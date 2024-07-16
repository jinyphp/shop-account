<?php
namespace Jiny\Shop\Account\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminUserPointHistoryController extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "user_point_history"; // 테이블 정보

        $this->actions['view_list'] = "jiny-shop-account::admin.user_point_history.list";
        $this->actions['view_form'] = "jiny-shop-account::admin.user_point_history.form";

    }

    public function hookIndexing($wire)
    {
        $nesteds = $wire->actions['nesteds'];
        $user = DB::table('users')->where('id',$nesteds['userid'])->first();

        $wire->sort['updated_at'] = "DESC";

        if($user) {
            $wire->user=[];
            $wire->user['email'] = $user->email;

            $wire->actions['where'] = [
                'user_id' => ['='=>$nesteds['userid'] ]
            ];

        }
    }

    ## 생성폼이 실행될때 호출됩니다.
    public function hookCreating($wire, $value)
    {
        $nesteds = $wire->actions['nesteds'];
        $user = DB::table('users')->where('id',$nesteds['userid'])->first();

        if($user) {
            $form['user_id'] = $user->id;
            $form['email'] = $user->email;

            $money = DB::table('user_point')->where('user_id',$nesteds['userid'])->first();
            if($money) {
                $form['balance'] = $money->balance;
            } else {
                $form['balance'] = 0;
            }

            return $form; // 초기 입력값 설정
        }
    }


    ## 신규 데이터 DB 삽입전에 호출됩니다.
    public function hookStoring($wire, $form)
    {

        if(isset($form['input']) && $form['input']) {
            $form['balance'] += $form['input'];
        }

        if(isset($form['output']) && $form['output']) {
            $form['balance'] -= $form['output'];
        }

        return $form; // 사전 처리한 데이터를 반환합니다.
    }

    public function hookStored($wire, $form)
    {
        $nesteds = $wire->actions['nesteds'];
        //dd($form['balance']);
        DB::table('user_point')->where('user_id',$nesteds['userid'])->update([
            'balance' => $form['balance']
        ]);
        $id = $form['id'];
    }

    public function hookUpdating($wire, $form, $old)
    {
        $nesteds = $wire->actions['nesteds'];
        $money = DB::table('user_point')->where('user_id',$nesteds['userid'])->first();

        $balance = $money->balance + $form['input'] - $form['output'];
        $balance = $balance - $old['input'] + $old['output'];

        $form['balance'] = $balance;

        DB::table('user_point')->where('user_id',$nesteds['userid'])->update([
            'balance' => $balance
        ]);

        return $form;
    }

    public function hookUpdated($wire, $form, $old)
    {
        return $form;
    }


    ## delete 동작이 실행 완료된 후에 호출됩니다.
    public function hookDeleted($wire, $form)
    {
        $nesteds = $wire->actions['nesteds'];
        $money = DB::table('user_point')->where('user_id',$nesteds['userid'])->first();

        $balance = $money->balance - $form['input'] + $form['output'];

        DB::table('user_point')->where('user_id',$nesteds['userid'])->update([
            'balance' => $balance
        ]);
        return $form;
    }

}
