<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parent_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_register_id')->constrained('student_registers')->onDelete('cascade');
            $table->string('father_name');
            $table->bigInteger('father_nik');
            $table->string('father_birth_place');
            $table->string('father_birth_date');
            $table->string('father_education');
            $table->string('father_job');
            $table->string('father_income');
            $table->string('father_address_rt');
            $table->string('father_address_rw');
            $table->string('father_address_hamlet');
            $table->string('father_address_village');
            $table->string('father_address_subdistrict');
            $table->string('father_address_regency');
            $table->string('mother_name');
            $table->bigInteger('mother_nik');
            $table->string('mother_birth_place');
            $table->string('mother_birth_date');
            $table->string('mother_education');
            $table->string('mother_job');
            $table->string('mother_income');
            $table->string('mother_address_rt');
            $table->string('mother_address_rw');
            $table->string('mother_address_hamlet');
            $table->string('mother_address_village');
            $table->string('mother_address_subdistrict');
            $table->string('mother_address_regency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_data');
    }
};
