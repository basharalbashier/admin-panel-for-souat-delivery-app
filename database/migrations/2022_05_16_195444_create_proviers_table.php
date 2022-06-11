<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

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
            $table->string('phone')->unique();
            $table->string('car_model');
            $table->string('car_number');
            $table->string('late')->nullable();
            $table->string('longe')->nullable();
            $table->string('active')->nullable();
            $table->string('blocked')->nullable();
            $table->string('varified')->nullable();
            $table->string('on_trip')->nullable();
            $table->string('from');
            $table->string('image');
            $table->string('car_type');
            $table->string('city');
            $table->string('birthday');
            $table->string('local_id_number');
            $table->string('local_id_image_front');
            $table->string('local_id_image_back');
            $table->string('local_id_ex');
            $table->string('license_number');
            $table->string('license_image');
            $table->string('license_ex');          
            $table->string('vehicle_ownership_number');
            $table->string('vehicle_ownership_ex');
            $table->string('vehicle_ownership_image');
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
