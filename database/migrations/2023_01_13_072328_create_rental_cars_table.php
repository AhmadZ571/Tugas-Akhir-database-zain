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
        Schema::create('rental_cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');   
            $table->string('NamaMobil')->nullable();
            $table->date('TanggalPenjemputan');
            $table->longText('AlamatPenjemputan');
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_cars');
    }
};
