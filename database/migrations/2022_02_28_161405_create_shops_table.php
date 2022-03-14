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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name',255);
            $table->string('email',55);
            $table->string('phone',55);
            $table->string('address',255);
            $table->string('image',255)->default('default_shop_image.jpg')->nullable();
            $table->text('about')->nullable();
            $table->enum('status',[1,2])->nullable()->default(2); //1 = Verificated , 2 = Not Verificated

            $table->timestamps();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
};
