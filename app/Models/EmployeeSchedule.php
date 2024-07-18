<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSchedule extends Model
{
    use HasFactory;

    protected $table = 'employee_schedule';

    protected $fillable = [
        'id_jadwal',
        'id_karyawan'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_karyawan', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'id_jadwal', 'id');
    }
}
