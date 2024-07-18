<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama_divisi'
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class, 'id_divisi', 'id');
    }

    public function job_position()
    {
        return $this->hasMany(JobPosition::class, 'id_divisi', 'id');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'id_divisi', 'id');
    }

    public function job_description()
    {
        return $this->hasMany(JobDescription::class, 'id_divisi', 'id');
    }
}
