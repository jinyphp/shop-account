<?php
namespace Jiny\Shop\Account\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminShopMemberShip extends WireTablePopupForms
{

    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ## 테이블 정보
        $this->actions['table'] = "shop_membership";

        $this->actions['title'] = "관리자: 쇼핑몰 회원등급";
        $this->actions['subtitle'] = "쇼핑몰 사용자 등급별로 회원 혜택을 지정합니다.";
        $this->actions['view']['title'] = "jiny-shop-account::admin.membership.title";

        // 목록출력
        $this->actions['view']['list'] = "jiny-shop-account::admin.membership.list";
        $this->actions['view']['form'] = "jiny-shop-account::admin.membership.form";

        /*





        // 레이아웃 전환
        //$this->setLayout('www');

        // 테마를 적용합니다.
        $this->setTheme("jinyerp/hr-admin");
        */


    }


}
