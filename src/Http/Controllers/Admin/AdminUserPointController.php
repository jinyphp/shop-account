<?php
namespace Jiny\Shop\Account\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminUserPointController extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "user_point"; // 테이블 정보

        $this->actions['view_list'] = "jiny-shop-account::admin.user_point.list";
        $this->actions['view_form'] = "jiny-shop-account::admin.user_point.form";

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
