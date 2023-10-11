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
        Schema::create('absensi_matkuls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('student_id')->constrained('users');
            $table->string('kode_absensi');
            $table->string('tahun_akademik');
            $table->string('semester');
            //pertemuan
            $table->string('pertemuan');
            //status
            $table->string('status');
            //keterangan
            $table->string('keterangan')->nullable();
            //latitude
            $table->string('latitude');
            //longitude
            $table->string('longitude');
            //nilai
            $table->string('nilai')->nullable();
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
        Schema::dropIfExists('absensi_matkuls');
    }
};
