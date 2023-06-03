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
        Schema::create('t_uudata', function (Blueprint $table) {
          $table->integer('no_spt')->nullable();
            $table->char('periode_spt', 4);
            $table->char('thn_bln', 6);
            $table->char('npwpd', 14);
            $table->char('rekening1', 3);
            $table->char('rekening2', 2);
            $table->char('rekening3', 2);
            $table->decimal('panjang', 19, 4)->nullable();
            $table->decimal('lebar', 19, 4)->nullable();
            $table->decimal('tinggi', 19, 4)->nullable();
            $table->decimal('luas', 19, 4)->nullable();
            $table->decimal('jumlah', 19, 4)->nullable();
            $table->smallInteger('nrt_urut')->nullable();
            $table->integer('no_kohir')->nullable();
            $table->date('tgl_data1')->nullable();
            $table->date('tgl_data2')->nullable();
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->date('tgl_tetap')->nullable();
            $table->date('tgl_terima')->nullable();
            $table->date('tgl_proses')->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->char('cara_bayar', 1)->nullable();
            $table->char('stat_data', 1)->nullable();
            $table->char('stat_spt', 1)->nullable();
            $table->char('stat_rec', 1)->nullable();
            $table->decimal('omset', 19, 4)->nullable();
            $table->decimal('setor', 19, 4)->nullable();
            $table->char('no_spt1', 20)->nullable();
            $table->char('no_mohon', 20)->nullable();
            $table->char('no_betul', 20)->nullable();
            $table->decimal('omset1', 19, 4)->nullable();
            $table->decimal('setor1', 19, 4)->nullable();
            $table->char('lokasi', 100)->nullable();
            $table->char('judul', 100)->nullable();
            $table->integer('lama_hari')->nullable();
            $table->char('rekening4', 2);
            $table->char('rekening5', 2)->nullable();

            $table->primary([
                'periode_spt',
                'thn_bln',
                'npwpd',
                'rekening1',
                'rekening2',
                'rekening3',
                'nrt_urut',
                'tgl_proses',
                'rekening4'
            ]);

            $table->index(['tgl_proses', 'no_spt'], 'odatas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_uudata');
    }
};
