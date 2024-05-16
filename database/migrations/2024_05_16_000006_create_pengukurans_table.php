<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengukuransTable extends Migration
{
    public function up()
    {
        Schema::create('pengukurans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('berat_badan', 15, 2);
            $table->float('tinggi_badan', 15, 2);
            $table->float('imt', 15, 2)->nullable();
            $table->float('lingkar_perut', 15, 2)->nullable();
            $table->float('tekanan_darah_diastole', 15, 2)->nullable();
            $table->float('tekanan_darah_sistole', 15, 2)->nullable();
            $table->integer('frekuensi_nafas')->nullable();
            $table->integer('nadi')->nullable();
            $table->integer('kadar_gula_darah')->nullable();
            $table->string('waktu_pengambilan_gula_darah')->nullable();
            $table->integer('kolesterol_total')->nullable();
            $table->integer('kolesterol_ldl')->nullable();
            $table->integer('kolesterol_hdl')->nullable();
            $table->integer('trigliserida')->nullable();
            $table->integer('kadar_hb')->nullable();
            $table->float('kadar_asam_urat', 15, 2)->nullable();
            $table->string('golongan_darah')->nullable();
            $table->float('hba_1_c', 15, 2)->nullable();
            $table->longText('kondisi_umum')->nullable();
            $table->longText('keluhan_perasaan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
