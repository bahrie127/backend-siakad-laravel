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
        Schema::create('khs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('student_id')->constrained('users');
            $table->string('nilai');
            //grade
            $table->string('grade');
            //keterangan
            $table->string('keterangan')->nullable();
            $table->string('tahun_akademik');
            $table->string('semester');
            $table->string('created_by');
            $table->string('updated_by');
            $table->string('deleted_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khs');
    }
};
