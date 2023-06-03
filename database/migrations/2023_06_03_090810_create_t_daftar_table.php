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
        Schema::create('t_daftar', function (Blueprint $table) {
            $table->string('npwpd');
            $table->string('nama_bu',75);
            $table->string('alamat_bu',100);
            $table->string('nama_wp',75);
            $table->string('alamat_wp',100);
            $table->string('no_telp');

            $table->primary('npwpd');
            $table->index('npwpd');
            $table->index('nama_bu');
            $table->index(['npwpd', 'nama_bu', 'nama_wp']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_daftar');
    }
};
