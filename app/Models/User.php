<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_role',
        'nama',
        'email',
        'username',
        'password',
        'foto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    public function salaryGenerates()
    {
        return $this->hasMany(SalaryGenerate::class, 'id_user', 'id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id_user', 'id');
    }

    public function materials()
    {
        return $this->hasMany(Agenda::class);
    }

    public function topic()
    {
        return $this->hasMany(Topic::class);
    }

    public function minute()
    {
        return $this->hasMany(Minute::class);
    }

    public function submissionModule()
    {
        return $this->hasMany(submissionModule::class);
    }

    public function docMinute()
    {
        return $this->hasMany(docMinute::class);
    }

    public function meetingParticipant()
    {
        return $this->hasMany(MeetingParticipant::class);
    }

}
