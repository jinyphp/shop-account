<?php
namespace Jiny\Shop\Account\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * 쇼핑몰 관리자: 회원 예치금 관리
 */
use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminUserCashController extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "user_cash"; // 테이블 정보

        $this->actions['view']['list'] = "jiny-shop-account::admin.user_cash.list";
        $this->actions['view']['form'] = "jiny-shop-account::admin.user_cash.form";

        $this->actions['title'] = "회원 예치금";
        $this->actions['subtitle'] = "회원별 예치금을 관리합니다.";
    }

    // 신규 데이터 DB 삽입전에 호출됩니다.
    public function hookStoring($wire,$form)
    {
        $user = DB::table('users')->where('email',$form['email'])->first();
        if($user) {
            $form['user_id'] = $user->id;
            return $form; // 사전 처리한 데이터를 반환합니다.
        }
    }



}
