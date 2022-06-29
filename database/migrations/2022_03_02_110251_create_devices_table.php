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
            $table->foreignId(('device_type_id'))->constrained('device_types');
            $table->string('naziv');
            $table->string('sistem')->nullable();
            $table->year('godina_izdanja')->nullable();
            $table->string('boja');
            $table->float('velicina')->nullable();
            $table->integer('kapacitet_baterije')->nullable();
            $table->integer('memorija')->nullable();
            $table->integer('RAM')->nullable();
            $table->string('kontakt');
            $table->string('cijena');
            $table->string('opis');
            $table->string('image');
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
