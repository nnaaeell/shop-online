<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('cart_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('desc');
            $table->integer('price');
            $table->string('picture');
            $table->timestamps();
           // $table->index('cart_id');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
