<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PollingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_id',
        'option',
        'votes',
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            if(empty($model->{$model->getKeyName()})){
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * Kita override getIncrementing method
     *
     * Menonaktifkan auto increment
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Kita override getKeyType method
     *
     * Memberi tahu laravel bahwa model ini menggunakan primary key bertipe string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public function polling()
    {
        return $this->belongsTo(Polling::class);
    }

    public function voter()
    {
        return $this->hasMany(Voter::class);
    }
}
