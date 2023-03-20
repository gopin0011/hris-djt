<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('alasan',1000)->nullable();
            $table->string('bidang',1000)->nullable();
            $table->string('rencana',1000)->nullable();
            $table->string('prestasi',1000)->nullable();
            $table->string('lamaran',1000)->nullable();
            $table->string('deskripsi',1000)->nullable();
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
        Schema::dropIfExists('questions');
    }
}
