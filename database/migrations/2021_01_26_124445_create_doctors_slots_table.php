<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('slot_number');
            $table->time('slot_start_time');
            $table->time('slot_end_time');
            $table->boolean('is_available');
            $table->smallInteger('week_number');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('schedule_id');
            $table->timestamps();

          $table->foreign('doctor_id')->references('id')->on('doctors');
          $table->foreign('schedule_id')->references('id')->on('doctors_schedule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors_slots');
    }
}
