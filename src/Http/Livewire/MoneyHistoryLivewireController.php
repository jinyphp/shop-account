<?php
namespace Jiny\Shop\Account\Http\Livewire;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Webuni\FrontMatter\FrontMatter;
use Jiny\Pages\Http\Parsedown;
use \Jiny\Html\CTag;
use Jiny\Shop\Entities\ShopSliders;
use Illuminate\Http\Request;

class MoneyHistoryLivewireController extends Component
{
    public $money_history = [];

    public function mount(Request $request)
    {   // 처음 controller 실행시 호출 함수.
        // 데이터베이스에서 사용자 계정 정보를 배열로 가져옵니다.
        //$this->money_history = $money_history;
        $rows = DB::table('user_money_history')
            -> where('id', $request->user_id)->first();
        //dd($rows);
        $this->money_history = $rows;
    }

    public function render()
    {   // 뷰 반환해주는 것. 동적인 페이지 호출해줌.
        return view('jiny-shop-account::user.myAccount.MoneyHistoryBlade',
        ['money_history'=>$this->money_history]);
    }
}
