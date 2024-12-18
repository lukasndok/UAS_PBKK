<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('kota');
            $table->datetime('tanggal_lahir');
            $table->string('Kelas');
            $table->bigInteger('ekstrakulikuler_id');
            $table->string('status');
            $table->dateTime('tanggal_pendaftaran');
            $table->bigInteger('user_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
};
