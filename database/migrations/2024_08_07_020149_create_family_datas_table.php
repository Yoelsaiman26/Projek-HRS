<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyDataTable extends Migration
{
    public function up()
    {
        Schema::create('family_data', function (Blueprint $table) {
            $table->id();
            $table->string('id_number');
            $table->string('mate_name')->nullable();
            $table->string('child_name')->nullable();
            $table->date('wedding_date')->nullable();
            $table->string('wedding_certificate_number')->nullable();
            $table->boolean('archived')->default(false); // Menambahkan kolom archived
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('family_data');
    }
}

