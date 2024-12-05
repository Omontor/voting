<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCandidatesTable extends Migration
{
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->foreign('creator_id', 'creator_fk_10305941')->references('id')->on('users');
            $table->unsignedBigInteger('month_id')->nullable();
            $table->foreign('month_id', 'month_fk_10305973')->references('id')->on('months');
        });
    }
}
