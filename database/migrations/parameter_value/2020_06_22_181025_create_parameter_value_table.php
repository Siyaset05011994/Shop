<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_value', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parameter_id')->unsigned();
            $table->foreign('parameter_id')->references('id')->on('parameters');
            $table->unique(['parameter_id', 'value']);
            $table->string('value');
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameter_value');
    }
}
