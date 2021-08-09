<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('user_name', 50);
            $table->string('email', 50);
            $table->bigInteger('phone_number');
            $table->string('gender', 10);
            $table->date('date_of_birth');
            $table->longText('biography');
            $table->string('image_path');
            $table->string('doctor_fee', 10);
            $table->timestamps();
            $table->primary('id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
