<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyDetail extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id_keluarga',
        'nama_lengkap',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'id_pekerjaan',
        'status_pernikahan',
        'hubungan_keluarga',
        'kewarganegaraan',
        'no_passport',
        'no_kitas',
        'nama_ayah',
        'nama_ibu'
    ];

    public function family()
    {
        return $this->belongsTo(Family::class, 'id_keluarga', 'id');
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'id_pekerjaan', 'id');
    }
}
