<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama_pekerjaan'
    ];

    public function family_details()
    {
        return $this->hasMany(FamilyDetail::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'id_pekerjaan', 'id');
    }
}
