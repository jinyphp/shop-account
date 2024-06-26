<?php
namespace Jiny\Shop\Account\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * 사용자별 무통장 입금시, 환급해야 되는 계좌
 * 라우트경로 : /admin/shop/user/bank
 */
use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminBankController extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "shop_bank"; // 테이블 정보

        // 테이블을 출력하는 목록 blade입니다.
        $this->actions['view']['list'] = "jiny-shop-account::admin.bank.list";

        // 신규 데이터 입력 및 수정폼 입니다.
        $this->actions['view']['form'] = "jiny-shop-account::admin.bank.form";
    }



}
