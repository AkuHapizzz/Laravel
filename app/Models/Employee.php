<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    // Pastikan semua kolom form ada di sini
    protected $fillable = [
        'nama_lengkap', 'email', 'nomor_telepon', 'tanggal_lahir', 'alamat',
        'tanggal_masuk', 'status', 'department_id', 'position_id'
    ];

    // Relasi ke Department
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    // Relasi ke Position
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}