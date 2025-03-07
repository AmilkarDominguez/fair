<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePavilionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pavilions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fair_id')->nullable();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->inique();
            $table->enum('state', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->timestamps();
            $table->foreign('fair_id')->references('id')->on('fairs')->onDedelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pavilions');
    }
}
