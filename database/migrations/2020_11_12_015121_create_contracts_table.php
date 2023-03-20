<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('status');
            $table->string('nomor');
            $table->string('nama');
            $table->string('kantor');
            $table->string('posisi');
            $table->string('awalkontrakhari');
            $table->string('awalkontrakbulan');
            $table->string('awalkontraktahun');
            $table->string('akhirkontrakhari');
            $table->string('akhirkontrakbulan');
            $table->string('akhirkontraktahun');
            $table->string('durasi');
            $table->string('ijazah');
            $table->string('nim');
            $table->string('jurusan');
            $table->string('lulus');
            $table->string('universitas');
            $table->string('gapok');
            $table->string('jabatan');
            $table->string('kinerja');
            $table->string('pulsa');
            $table->string('makan');
            $table->string('transport');
            $table->string('direktur');
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
        Schema::dropIfExists('contracts');
    }
}
