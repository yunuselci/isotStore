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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->text('description');
            $table->string('image',255);
            $table->string('unit',45);
            $table->enum('type',[1,2])->default(1); //1 = For Sale, 2 = For Rent
            $table->enum('status',[1,2])->default(1); //1 = New Brand, 2 = Second Hand
            $table->enum('delivery_status',[1,2,3])->default(1); //1 = In stock, 2 = No stock, 3= Stock can be available by the order
            $table->enum('faulty',[1,2])->default(1); //1 = No faulty, 2= Defective product
            $table->string('origin',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
