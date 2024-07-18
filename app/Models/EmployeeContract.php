<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeContract extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id_karyawan',
        'id_kontrak',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_karyawan', 'id');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'id_kontrak', 'id');
    }
}
