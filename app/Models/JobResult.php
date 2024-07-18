<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobResult extends Model
{
    use HasFactory;

    protected $table = 'job_results';

    protected $fillable = [
        'id_karyawan',
        'id_jobdesc',
        'foto',
        'keterangan',
        'status',
        'pemeriksa'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_karyawan', 'id');
    }

    public function job_description()
    {
        return $this->belongsTo(JobDescription::class, 'id_jobdesc', 'id');
    }

    public function task_approval()
    {
        return $this->hasMany(TaskApproval::class, 'id_jobresult', 'id');
    }
}
