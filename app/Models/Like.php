<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Like extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_ip',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likeable() {
        return $this->morphTo();
    }
}
