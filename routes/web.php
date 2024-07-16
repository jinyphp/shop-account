<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$shop_prefix = "shop";

Route::middleware(['web'])
->name($shop_prefix)
->prefix($shop_prefix)->group(function () {

});

## 인증 없이 접속가능한 경로 처리
Route::middleware(['web'])->group(function(){
    ## 분쟁조정
    Route::get('/admin/shop/dispute',[
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminDisputeController::class,
        "index"
    ]);

    Route::get('/admin/shop/shop_dispute_history',[
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminDisputeHistoryController::class,
        "index"
    ]);

    ## 맴버쉽
    Route::get('/admin/shop/membership', [
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminShopMembership::class,
        "index"]);

    ## 고객계좌
    ## 환불등을 처리하기 위한 계좌정보
    Route::get('/admin/shop/user/bank',[
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminBankController::class,
        "index"
    ]);



    ## 쇼핑몰 회원, 주소명단
    Route::get('/admin/shop/user/address', [
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminUserAddressController::class,
        "index"]);

    ## 회원 예치금
    Route::get('/admin/shop/user/cash', [
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminUserCashController::class,
        "index"]);

    Route::get('/admin/shop/user/cash/{userid}', [
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminUserCashHistoryController::class,
        "index"]);

    ## 회원등급
    Route::get('/admin/shop/user/grade',[
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminUserGradeController::class,
        "index"]);

    ## 적립금
    Route::get('/admin/shop/user/money', [
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminUserMoneyController::class,
        "index"]);

    Route::get('/admin/shop/user/money/{userid}', [
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminUserMoneyHistoryController::class,
        "index"]);

    ## 포인트
    Route::get('/admin/shop/user/point', [
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminUserPointController::class,
        "index"]);

    Route::get('/admin/shop/user/point/{userid}', [
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminUserPointHistoryController::class,
        "index"]);

    ## 연락처
    Route::get('/admin/shop/user/phone', [
        \Jiny\Shop\Account\Http\Controllers\Admin\AdminUserPhoneController::class,
        "index"]);

});




/**
 * 회원(로그인) 사용자 링크
 */
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/shop/user', [
        \Jiny\Shop\Http\Controllers\User\UserDashboardController::class,
        "index"]);

    Route::get('/shop/user/profile', [
        \Jiny\Shop\Http\Controllers\User\UserProfileController::class,
        "index"]);

    Route::get('/shop/user/password/change', [
        \Jiny\Shop\Http\Controllers\User\UserPasswordChangeController::class,
        "index"]);

});


