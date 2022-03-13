<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 255);
            $table->string('user_email',55);
            $table->string('user_phone',55);
            $table->string('description',255);
            $table->enum('status',[1,2])->default(2)->nullable(); // 1) readed 2) new
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')
                ->on('shops')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
