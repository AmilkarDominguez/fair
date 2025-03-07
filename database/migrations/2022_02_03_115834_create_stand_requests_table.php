<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stand_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pavilion_id')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('company_name')->nullable();
            $table->string('slug')->inique();
            $table->enum('request_state', ['PENDING', 'APPROVED', 'REJECTED'])->default('PENDING');
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
        Schema::dropIfExists('stands');
    }
}
