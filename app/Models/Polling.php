<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Polling extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'agenda_id',
        'type',
        'question',
        'status',
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

    public function pollingDetail()
    {
        return $this->hasMany(PollingDetail::class);
    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }

    public function submissionModule()
    {
        return $this->belongsTo(submissionModule::class);
    }
}
