<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberChurchContactsTable extends Migration
{
    public function up()
    {
        Schema::create('member_church_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->longText('address')->nullable();
            $table->timestamps();
        });
    }
}
