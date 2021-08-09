<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city', 30);
            $table->string('state', 30);
            $table->string('country', 50);
            $table->integer('postal_code');
            $table->unsignedBigInteger('doctor_id');
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors_addresses');
    }
}
