<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'poll_detail_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pollingDetail()
    {
        return $this->belongsTo(PollingDetail::class);
    }
}
