<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pengaduans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_tipe',
        'id_employee',
        'id_user',
        'nomor_tiket',
        'disetujui_oleh',
        'subjek_tiket',
        'deskripsi',
        'dokumen_pendukung',
        'status',
        'prioritas'
    ];


    public function getCreatedAtAttribute() {
    return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
    }

    public function getUpdatedAtAttribute() {
    return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    public function tipe_tiket(){
        return $this->belongsTo(TipeTiket::class, 'id_tipe', 'id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'id_employee', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh', 'id');
    }

}
