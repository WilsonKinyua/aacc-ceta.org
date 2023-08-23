<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('position');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longText('bio')->nullable();
            $table->timestamps();
        });
    }
}
