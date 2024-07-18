<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'request_id',
        'title',
        'description',
        'supporting_file',
        'status',
        'rejection_reason'
    ];

    // Set default values for attributes
    protected $attributes = [
        'status' => 'Menunggu Persetujuan',
    ];

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

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with MeetingRequest
    public function meetingRequest()
    {
        return $this->belongsTo(MeetingRequest::class);
    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
