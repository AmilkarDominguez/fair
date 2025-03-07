<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pavilion_id')->nullable();
            $table->unsignedBigInteger('stand_request_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('url_video')->nullable();
            $table->string('banner_a')->nullable();
            $table->string('banner_b')->nullable();
            $table->string('banner_c')->nullable();
            $table->string('banner_d')->nullable();
            $table->string('banner_e')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('web_site')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('slug')->inique();
            $table->enum('state', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->timestamps();
            $table->foreign('pavilion_id')->references('id')->on('pavilions')->onDedelete('cascade');
            $table->foreign('stand_request_id')->references('id')->on('stand_requests')->onDedelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stands');
    }
}
