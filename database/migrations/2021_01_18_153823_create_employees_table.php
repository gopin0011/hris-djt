<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->string('kk')->nullable();
            $table->string('ktp')->nullable();
            $table->string('gender')->nullable();
            $table->string('agama')->nullable();
            $table->string('tmlahir')->nullable();
            $table->string('hlahir')->nullable();
            $table->string('blahir')->nullable();
            $table->string('thahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('bisnis')->nullable();
            $table->string('divisi')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('status')->nullable();
            $table->string('hjoin')->nullable();
            $table->string('bjoin')->nullable();
            $table->string('thjoin')->nullable();
            $table->string('hakhir')->nullable();
            $table->string('bakhir')->nullable();
            $table->string('thakhir')->nullable();
            $table->string('masa')->nullable();
            $table->string('gaji')->nullable();
            $table->string('rekening')->nullable();
            $table->string('npwp')->nullable();
            $table->string('ptkp')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('prodi')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('email')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('sp1')->nullable();
            $table->string('sp2')->nullable();
            $table->string('sp3')->nullable();
            $table->string('hreward5')->nullable();
            $table->string('breward5')->nullable();
            $table->string('threward5')->nullable();
            $table->string('reward5')->nullable();
            $table->string('hreward10')->nullable();
            $table->string('breward10')->nullable();
            $table->string('threward10')->nullable();
            $table->string('reward10')->nullable();
            $table->string('hreward15')->nullable();
            $table->string('breward15')->nullable();
            $table->string('threward15')->nullable();
            $table->string('reward15')->nullable();
            $table->string('resign')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
