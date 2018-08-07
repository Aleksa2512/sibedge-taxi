<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address_start', 255);
            $table->string('address_finish', 255);
            $table->timestamp('time_accepted_at');
            $table->unsignedTinyInteger('is_come_client')->default(0);
            $table->unsignedTinyInteger('is_active')->default(0);
            $table->unsignedTinyInteger('is_completed')->default(0);
            $table->unsignedInteger('driver_id')->index();
            $table->unsignedInteger('car_id')->index();
            $table->unsignedInteger('operator_id')->index();

            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
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
}
