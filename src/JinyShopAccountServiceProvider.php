<?php
namespace Jiny\Shop\Account;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

class JinyShopAccountServiceProvider extends ServiceProvider
{
    private $package = "jiny-shop-account";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // 설정파일 복사
        $this->publishes([
            __DIR__.'/../config/setting.php' => config_path('jiny/shop/account.php'),
        ]);



    }

    public function register()
    {
        /* 라이브와이어 컴포넌트 등록 */
        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('ListCashHistory',
            \Jiny\Shop\Account\Http\Livewire\CashHistoryLivewireController::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('ListMoneyHistory',
            \Jiny\Shop\Account\Http\Livewire\MoneyHistoryLivewireController::class);
        });

        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('ListPointHistory',
            \Jiny\Shop\Account\Http\Livewire\PointHistoryLivewireController::class);
        });
    }
}
