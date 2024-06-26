<?php
namespace Jiny\Shop\Account\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * 분쟁 처리
 * 라우트경로 : /admin/shop/shop_dispute
 */
use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminDisputeController extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "shop_dispute"; // 테이블 정보

        // 테이블을 출력하는 목록 blade입니다.
        $this->actions['view']['list'] = "jiny-shop-account::admin.dispute.list";

        // 신규 데이터 입력 및 수정폼 입니다.
        $this->actions['view']['form'] = "jiny-shop-account::admin.dispute.form";
    }



}
