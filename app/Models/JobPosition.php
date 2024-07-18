<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id_divisi',
        'nama_posisi'
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class, 'id_posisi', 'id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'id_divisi', 'id');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'id_posisi', 'id');
    }

    public function job_description()
    {
        return $this->hasMany(JobDescription::class, 'id_posisi', 'id');
    }
}
