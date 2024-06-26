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
        Schema::create('shop_dispute_history', function (Blueprint $table) {
            $table->id();  // user_id
            $table->timestamps();
            $table->integer('ref')->default(0);
            $table->integer('level')->default(0);
            $table->integer('pos')->default(1);

            $table->string('enable')->default(1); //활성화 여부(ex 욕 막 써놓았으면 아예 안 보이게 해버림)
            $table->bigInteger('dispute_id');    //분쟁 분류번호

            $table->text('content')->nullable();  //분쟁 내용

            $table->string('image')->nullable();  //사진 첨부

            $table->string('email')->nullable();  //구매자 이메일. 역정규화 과정.


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_dispute_history');
    }
};
