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

class MyAccountLivewireController extends Component
{
    public $cash_history = [];

    public function mount(Request $request)
    {   // 처음 controller 실행시 호출 함수.
        // 데이터베이스에서 사용자 계정 정보를 배열로 가져옵니다.
        //$this->cash_history = $cash_history;
        $rows = DB::table('user_cash_history')
            -> where('id', $request->user_id)->first();
        // dd($rows);
        $this->cash_history = $rows;
    }

    public function render()
    {   // 뷰 반환해주는 것. 동적인 페이지 호출해줌.
        return view('jiny-shop-account::user.myAccount.firsttrial',
        ['cash_history'=>$this->cash_history]);
    }
}
