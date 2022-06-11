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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_comment')->nullable();
            $table->string('rate')->nullable();
            $table->string('start_address');
            $table->string('start_late');
            $table->string('start_longe');
            $table->string('end_address');
            $table->string('end_late');
            $table->string('end_longe');
            $table->string('fee');
            $table->string('car_type');
            $table->string('distance');
            $table->string('status');
            $table->string('provider_id')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('provider_phone')->nullable();
            $table->string('last_late')->nullable();
            $table->string('last_longe')->nullable();
            $table->string('canceled_at')->nullable();
            $table->string('end_at')->nullable();
            $table->string('admin_comment')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
