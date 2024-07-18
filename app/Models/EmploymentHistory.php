<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id_karyawan',
        'nama_perusahaan',
        'tgl_masuk',
        'tgl_keluar',
        'posisi',
        'created_at',
        'updated_at'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_karyawan', 'id');
    }
}
