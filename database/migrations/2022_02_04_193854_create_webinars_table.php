<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pavilion_id');
            $table->string('title');
            $table->string('exhibitor_name');
            $table->string('photo');
            $table->string('logo');
            $table->string('link');
            $table->time('start_time');
            $table->time('end_time');
            $table->date('date');
            $table->string('description')->nullable();
            $table->string('slug')->inique();
            $table->enum('state', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->timestamps();
            $table->foreign('pavilion_id')->references('id')->on('pavilions')->onDedelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars');
    }
}
