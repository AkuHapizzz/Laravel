<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_id',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status',
    ];

    /**
     * Mendefinisikan relasi ke model Employee.
     * Setiap data Absensi dimiliki oleh satu Pegawai.
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}