<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Agenda extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'topic_id',
        'title',
        'description',
        'date',
        'time',
        'meeting_type',
        'meeting_address',
        'status',
        'rejection_reason',
        'distributed_at',
        'completed_at',
    ];

    /**
     * Kita override boot method
     *
     * Mengisi primary key secara otomatis dengan UUID ketika membuat record
     */
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

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function minute()
    {
        return $this->belongsTo(minute::class);
    }

    public function presence()
    {
        return $this->hasMany(presence::class);
    }

    public function polling()
    {
        return $this->hasMany(Polling::class);
    }
}
