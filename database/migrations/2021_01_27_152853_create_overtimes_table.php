<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtimes', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('hari')->nullable();
            $table->string('hspl')->nullable();
            $table->string('bspl')->nullable();
            $table->string('thspl')->nullable();
            $table->string('bisnis')->nullable();
            $table->string('divisi')->nullable();
            $table->string('waktu')->nullable();
            $table->string('pemohon')->nullable();
            $table->string('manajer')->nullable();
            $table->string('nmmanajer')->nullable();
            $table->string('hr')->nullable();
            $table->string('nmhr')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('overtimes');
    }
}
