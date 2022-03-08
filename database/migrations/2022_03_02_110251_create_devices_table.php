<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('tip');
            $table->string('naziv');
            $table->string('sistem');
            $table->year('godina_izdanja');
            $table->string('boja');
            $table->float('velicina'); //->nullable();
            $table->integer('kapacitet_baterije');
            $table->integer('memorija');
            $table->integer('RAM');
            $table->string('kontakt');
            $table->string('opis');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('devices');
    }
}
