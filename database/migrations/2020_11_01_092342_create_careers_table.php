<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('perusahaan');
            $table->string('alamat')->nullable();
            $table->string('jabatan');
            $table->string('bulanmasuk');
            $table->string('tahunmasuk');
            $table->string('bulankeluar');
            $table->string('tahunkeluar');
            $table->string('gaji')->nullable();
            $table->string('pekerjaan');
            $table->string('prestasi')->nullable();
            $table->string('alasan');
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
        Schema::dropIfExists('careers');
    }
}
