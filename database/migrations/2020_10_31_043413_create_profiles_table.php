<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('panggilan')->nullable();
            $table->string('nik')->nullable();
            $table->string('kontak');
            $table->string('tempatlahir');
            $table->string('hari');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('gender');
            $table->string('warganegara');
            $table->string('agama');
            $table->string('status');
            $table->string('darah')->nullable();
            $table->string('alamat');
            $table->string('domisili');
            $table->string('hobi')->nullable();
            $table->string('tingkat');
            $table->string('sekolah');
            $table->string('posisi')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('referensi')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
