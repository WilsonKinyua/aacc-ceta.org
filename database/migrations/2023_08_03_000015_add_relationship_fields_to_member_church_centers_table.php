<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMemberChurchCentersTable extends Migration
{
    public function up()
    {
        Schema::table('member_church_centers', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id', 'country_fk_8828747')->references('id')->on('countries');
        });
    }
}
