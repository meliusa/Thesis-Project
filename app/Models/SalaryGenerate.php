<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryGenerate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'tanggal_dibuat',
        'status',
        'tanggal_disetujui',
        'disetujui_oleh'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
