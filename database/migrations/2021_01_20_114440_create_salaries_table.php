<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->string('kpi')->nullable();
            $table->string('pkpi')->nullable();
            $table->string('nominal')->nullable();
            $table->string('hkpi')->nullable();
            $table->string('bkpi')->nullable();
            $table->string('thkpi')->nullable();
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
        Schema::dropIfExists('salaries');
    }
}
