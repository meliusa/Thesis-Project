<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'id_jobdesc',
        'tugas'
    ];

    public function job_description()
    {
        return $this->belongsTo(JobDescription::class, 'id_jobdesc', 'id');
    }

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function task_approval()
    {
        return $this->hasMany(TaskApproval::class, 'id_task', 'id');
    }
}
