<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punishments', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('nik');
            $table->string('nama');
            $table->string('bisnis');
            $table->string('divisi');
            $table->string('jabatan');
            $table->string('namahari');
            $table->string('hari');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('jenis');
            $table->string('alasan');
            $table->string('hr');
            $table->string('direktur');
            $table->string('atasan');
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
        Schema::dropIfExists('punishments');
    }
}
