<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeTiket extends Model
{
    use HasFactory;

    protected $table = 'tipe_tiket';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tipe_tiket'
    ];

    public function pengaduan() {
        return $this->hasMany(Pengaduan::class, 'id_tipe', 'id');
    }
}
