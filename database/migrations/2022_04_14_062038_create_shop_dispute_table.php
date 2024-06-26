<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations. 쇼핑몰 고객 분쟁 목록
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_dispute', function (Blueprint $table) {
            $table->id();  // 프라이머리키
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('enable')->default(1);     // 분쟁 활성화 여부(표시여부)

            $table->bigInteger('order_id');     //주문번호
            $table->string('product')->nullable();      //분쟁 일어난 상품명

            $table->string('title')->nullable();  //분쟁 제목
            $table->string('status')->nullable();  //진행상태

            $table->string('start_date')->nullable();  //분쟁 시작일자
            $table->string('end_date')->nullable();  //분쟁 종료일자

            $table->text('description')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_dispute');
    }
};
