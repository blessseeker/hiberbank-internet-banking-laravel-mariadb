<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenyesuaianTabelUsersUntukVerifikasiRegistrasi extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('verifikasi_tempat_lahir');
            $table->string('verifikasi_tanggal_lahir');
            $table->string('verifikasi_nama_ibu_kandung');
            $table->string('verifikasi_foto_ktp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('verifikasi_tempat_lahir');
            $table->dropColumn('verifikasi_tanggal_lahir');
            $table->dropColumn('verifikasi_nama_ibu_kandung');
            $table->dropColumn('verifikasi_foto_ktp');
        });
    }
}
