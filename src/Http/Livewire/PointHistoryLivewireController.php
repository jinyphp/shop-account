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

class PointHistoryLivewireController extends Component
{
    public $point_history = [];

    public function mount(Request $request)     // 여기서 request는 무엇? HTTP 요청 정보가 담긴 객체.
    {   // 처음 controller 실행시 호출 함수.
        // 데이터베이스에서 사용자 계정 정보를 배열로 가져옵니다.
        //$this->point_history = $point_history;
        $rows = DB::table('user_point_history')
            -> where('id', $request->user_id)->first();   // request의 첫번째만 가져오는. 뭘 가져와?
            //'id' column == $request->user_id 인 row를 가져오는데, ->first()이므로. 하나만 가져와(id는 애초에 중복 불가능)
        //dd($rows);
        $this->point_history = $rows;
    }

    public function render()
    {   // 뷰 반환해주는 것. 동적인 페이지 호출해줌.
        return view('jiny-shop-account::user.myAccount.PointHistoryBlade',   // 호출할 블레이드파일.
        ['point_history'=>$this->point_history]);
    }
}
