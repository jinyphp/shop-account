<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ## 멤버십 회원구분 정책
        Schema::create('shop_membership', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            ## 맴버이음
            $table->string('user')->nullable(); // 실제 회원과 연결되는 join값
            $table->string('name')->nullable();

            ## 정책 설명
            $table->text('description')->nullable();

            ## 결제방식 허용
            //조건 2개 "카드; 현금"
            $table->string('pay_condition')->nullable(); // 외부테이블 만들어, 조인

            ## 회원등급
            // gold -> 이미지를 출력
            $table->string('grade')->nullable();

            ## 혜택
            $table->string('benefits')->nullable(); // 외부조인




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_membership');
    }
};
