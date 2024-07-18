<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskApproval extends Model
{
    use HasFactory;

    protected $table = 'task_approvals';

    protected $fillable = [
        'id_task',
        'id_jobresult'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'id_task', 'id');
    }

    public function job_result()
    {
        return $this->belongsTo(JobResult::class, 'id_jobresult', 'id');
    }
}
