<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryAdvance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_gaji',
        'bulan',
        'tahun',
        'kategori',
        'keterangan',
        'jumlah',
        'total_gaji'
    ];

    public function employee_salary()
    {
        return $this->belongsTo(EmployeeSalary::class, 'id_gaji', 'id');
    }
}