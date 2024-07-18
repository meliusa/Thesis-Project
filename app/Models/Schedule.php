<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'id_divisi',
        'id_posisi',
        'periode_mulai',
        'periode_selesai',
        'jam_masuk',
        'jam_pulang'
    ];

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'id_divisi', 'id');
    }

    public function job_position()
    {
        return $this->belongsTo(JobPosition::class, 'id_posisi', 'id');
    }

    public function employee_schedule()
    {
        return $this->hasMany(EmployeeSchedule::class, 'id_jadwal', 'id');
    }
}
