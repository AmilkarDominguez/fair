<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('owner')->nullable();
            $table->longText('about_owner')->nullable();
            $table->string('email')->inique();
            $table->string('telephone')->nullable();
            $table->string('nro_whatsapp')->nullable();

            $table->string('url_facebook')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('url_youtube')->nullable();

            $table->string('address')->nullable();
            $table->string('schedule')->nullable();

            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->string('slug')->inique();

            //Multimedia
            $table->string('logo')->nullable();
            $table->string('static_banner')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
