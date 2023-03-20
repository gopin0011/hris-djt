<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('posisi');
            $table->string('posisialt')->nullable();
            $table->string('code')->nullable();
            $table->string('info')->nullable();
            $table->string('kerabat')->nullable();
            $table->string('jadwalhari')->nullable();
            $table->string('jadwalbulan')->nullable();
            $table->string('jadwaltahun')->nullable();
            $table->string('jadwaljam')->nullable();
            $table->string('inthr')->nullable();
            $table->string('namahr')->nullable();
            $table->string('intuser')->nullable();
            $table->string('namauser')->nullable();
            $table->string('intmana')->nullable();
            $table->string('namamana')->nullable();
            $table->string('disctest')->nullable();
            $table->string('ist')->nullable();
            $table->string('cfit')->nullable();
            $table->string('armyalpha')->nullable();
            $table->string('papikostik')->nullable();
            $table->string('kreprlin')->nullable();
            $table->string('hasil')->nullable();
            $table->string('gabunghari')->nullable();
            $table->string('gabungbulan')->nullable();
            $table->string('gabungtahun')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
