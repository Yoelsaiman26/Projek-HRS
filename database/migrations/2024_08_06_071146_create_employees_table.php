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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigInteger('id_number')->primary();
            $table->string('full_name');
            $table->string('nickname')->nullable();
            $table->date('contract_date')->nullable();
            $table->date('work_date')->nullable();
            $table->enum('status', ['Aktif', 'Berhenti'])->default('Aktif');  // tambahkan default value
            $table->string('position')->nullable();
            $table->string('nuptk')->nullable();
            $table->enum('gender', ['pria', 'wanita'])->nullable();
            $table->string('place_birth')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('religion')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('hobby')->nullable();
            $table->enum('marital_status', ['menikah', 'belum'])->nullable();
            $table->string('marriage_certificate_number')->nullable();
            $table->string('residence_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('address_emergency')->nullable();
            $table->string('phone_emergency')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('last_education')->nullable();
            $table->string('agency')->nullable();
            $table->integer('graduation_year')->nullable();
            $table->string('competency_training_place')->nullable();
            $table->text('organizational_experience')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
