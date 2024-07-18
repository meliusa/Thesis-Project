<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    use HasFactory;

    protected $table = 'job_descriptions';

    protected $fillable = [
        'id_divisi',
        'id_posisi',
        'periode_mulai',
        'periode_selesai'
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

    public function task()
    {
        return $this->hasMany(Task::class, 'id_jobdesc', 'id');
    }

    public function job_result()
    {
        return $this->hasMany(JobResult::class, 'id_jobdesc', 'id');
    }
}
