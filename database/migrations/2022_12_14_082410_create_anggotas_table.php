<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nama_anggota');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->string('alamat');
            $table->string('kelompok');
            $table->string('petugas');
            $table->bigInteger('id_cabang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}
