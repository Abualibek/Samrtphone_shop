<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmartphoneSpecifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smartphone_specifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('Network');
            $table->string('Body');
            $table->string('Display');
            $table->string('Platform');
            $table->string('Memory');
            $table->string('Sound');
            $table->string('Battery');
            $table->string('MainCamera');
            $table->string('SelfieCamera');
            $table->string('price');
            $table->binary('img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smartphone_specifications');
    }
}
