<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id_karyawan',
        'no_kk',
        'kepala_keluarga',
        'alamat',
        'rt/rw',
        'desa/kelurahan',
        'kecamatan',
        'kabupaten/kota',
        'kode_pos',
        'provinsi',
        'foto_kk'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_karyawan', 'id');
    }

    public function family_details()
    {
        return $this->hasMany(FamilyDetail::class, 'id_keluarga', 'id');
    }
}
