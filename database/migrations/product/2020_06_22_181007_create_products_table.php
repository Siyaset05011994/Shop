<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores');
            $table->string('name');
            $table->text('text');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->integer('status')->default(1);
            $table->integer('quantity');
            $table->text('images')->default(null);
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
}
