<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMemberChurchContactsTable extends Migration
{
    public function up()
    {
        Schema::table('member_church_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('member_church_center_id')->nullable();
            $table->foreign('member_church_center_id', 'member_church_center_fk_8828755')->references('id')->on('member_church_centers');
        });
    }
}
