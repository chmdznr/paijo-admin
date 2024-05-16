<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitaTable extends Migration
{
    public function up()
    {
        Schema::create('identita', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->float('tinggi_badan', 15, 2);
            $table->float('berat_badan', 15, 2);
            $table->string('suku')->nullable();
            $table->string('riwayat_perokok')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('status_pernikahan')->nullable();
            $table->longText('alamat')->nullable();
            $table->date('tanggal_pertama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
