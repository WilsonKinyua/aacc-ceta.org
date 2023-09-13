<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('when');
            $table->string('title')->unique();
            $table->string('location')->nullable();
            $table->longText('description')->nullable();
            $table->longText('slug')->nullable();
            $table->timestamps();
        });
    }
}
