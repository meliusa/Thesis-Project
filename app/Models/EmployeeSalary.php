<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_karyawan',
        'nik_karyawan',
        'gaji_pokok',
        'asuransi',
        'PPH21',
        'gaji_bersih'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_karyawan', 'id');
    }

    public function salary_advance()
    {
        return $this->hasMany(SalaryAdvance::class, 'id_gaji', 'id');
    }
}
