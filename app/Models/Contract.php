<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'tipe_kontrak',
        'durasi'
    ];

    public function employee_contract()
    {
        return $this->hasMany(EmployeeContract::class);
    }
}
