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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('description',255);
            $table->string('image',255);
            $table->string('unit',45);
            $table->enum('type',[1,2])->default(1); //1 = For Sale, 2 = For Rent
            $table->enum('status',[1,2])->default(1); //1 = New Brand, 2 = Second Hand
            $table->enum('delivery_status',[1,2,3])->default(1); //1 = In stock, 2 = No stock, 3= Stock can be available by the order
            $table->enum('faulty',[1,2])->default(1); //1 = No faulty, 2= Defective listing
            $table->string('origin',45);
            $table->string('seflink', 255);
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('shop_id')->references('id')
                ->on('shops')->onDelete('cascade');
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('listings');
    }
};
