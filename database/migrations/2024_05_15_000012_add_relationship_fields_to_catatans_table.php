<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCatatansTable extends Migration
{
    public function up()
    {
        Schema::table('catatans', function (Blueprint $table) {
            $table->unsignedBigInteger('identitas_id')->nullable();
            $table->foreign('identitas_id', 'identitas_fk_9786605')->references('id')->on('identita');
        });
    }
}
