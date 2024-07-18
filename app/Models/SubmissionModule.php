<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubmissionModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'purpose',
        'agenda',
        'date',
        'time',
        'duration',
        'type',
        'location',
        'supporting_document',
        'postscript',
        'status',
        'reason_cancelled',
        'approved_at',
        'distributed_at',
        'cancelled_at',
        'implemented_at',
        'provided_at',
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

    public function docMinute()
    {
        return $this->belongsTo(docMinute::class);
    }

    public function polling()
    {
        return $this->belongsTo(Polling::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meetingParticipant()
    {
        return $this->hasMany(MeetingRequest::class);
    }

}