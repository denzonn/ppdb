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
        Schema::create('student_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_register_id')->constrained('student_registers')->onDelete('cascade');
            $table->string('fullname');
            $table->string('name');
            $table->string('gender');
            $table->bigInteger('nik');
            $table->string('birth_place');
            $table->string('birth_date');
            $table->string('old_school');
            $table->string('religion');
            $table->string('address_rt');
            $table->string('address_rw');
            $table->string('address_hamlet');
            $table->string('address_village');
            $table->string('address_subdistrict');
            $table->string('address_regency');
            $table->string('living_together');
            $table->bigInteger('no_telp');
            $table->integer('child_order');
            $table->integer('siblings');
            $table->string('hobby');
            $table->string('goal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_data');
    }
};
