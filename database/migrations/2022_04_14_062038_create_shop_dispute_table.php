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
        Schema::create('shop_dispute', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('enable')->default(1);

            $table->bigInteger('order_id'); //주문번호
            $table->string('product')->nullable();      // 상품명

            $table->string('title')->nullable();  //제목
            $table->string('status')->nullable();  //상태

            $table->string('start_date')->nullable();  //시작일자
            $table->string('end_date')->nullable();  //종료일자


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
