<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArchivedToKaryawan extends Migration
{
    public function up()
    {
        // Tambahkan kolom archived ke tabel employees jika belum ada
        if (!Schema::hasColumn('employees', 'archived')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->boolean('archived')->default(false);
            });
        }

        // Tambahkan kolom archived ke tabel family_data jika belum ada
        if (!Schema::hasColumn('family_data', 'archived')) {
            Schema::table('family_data', function (Blueprint $table) {
                $table->boolean('archived')->default(false);
            });
        }
    }

    public function down()
    {
        // Hapus kolom archived dari tabel employees jika ada
        if (Schema::hasColumn('employees', 'archived')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->dropColumn('archived');
            });
        }

        // Hapus kolom archived dari tabel family_data jika ada
        if (Schema::hasColumn('family_data', 'archived')) {
            Schema::table('family_data', function (Blueprint $table) {
                $table->dropColumn('archived');
            });
        }
    }
}

