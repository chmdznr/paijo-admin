<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatansTable extends Migration
{
    public function up()
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('isi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
