<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Menggunakan nama tabel plural 'attendances' sesuai konvensi Laravel
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            // Cara modern untuk membuat foreign key
            // 'employee_id' mengacu pada model 'Employee'
            $table->foreignId('employee_id')
                  ->constrained('employees') // Terhubung ke tabel 'employees'
                  ->onDelete('cascade');    // Jika pegawai dihapus, absensinya juga terhapus

            $table->date('tanggal');
            $table->time('waktu_masuk');
            $table->time('waktu_keluar')->nullable(); // Boleh kosong saat baru absen masuk
            $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Alpha']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
