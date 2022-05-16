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
        Schema::create('proviers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('car_model');
            $table->string('car_number');
            $table->string('late');
            $table->string('longe');
            $table->string('active');
            $table->string('blocked');
            $table->string('varified');
            $table->string('on_trip');
            $table->string('from');
            $table->string('image');
            $table->string('car_type');
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
        Schema::dropIfExists('proviers');
    }
};
