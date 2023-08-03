<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberChurchCentersTable extends Migration
{
    public function up()
    {
        Schema::create('member_church_centers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }
}
