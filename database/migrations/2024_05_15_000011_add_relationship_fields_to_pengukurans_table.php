<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPengukuransTable extends Migration
{
    public function up()
    {
        Schema::table('pengukurans', function (Blueprint $table) {
            $table->unsignedBigInteger('identitas_id')->nullable();
            $table->foreign('identitas_id', 'identitas_fk_9786559')->references('id')->on('identita');
        });
    }
}
