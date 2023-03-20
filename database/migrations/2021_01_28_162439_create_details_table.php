<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('splid');
            $table->string('nama');
            $table->string('nik')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('spk')->nullable();
            $table->string('nospk')->nullable();
            $table->string('hasil')->nullable();
            $table->string('persen')->nullable();
            $table->string('mulai')->nullable();
            $table->string('akhir')->nullable();
            $table->string('total')->nullable();
            $table->string('makan')->nullable();
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
        Schema::dropIfExists('details');
    }
}
