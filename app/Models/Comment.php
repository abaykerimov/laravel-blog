<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;

    protected $fillable = [
        'body',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function commentable() {
        return $this->morphTo();
    }
}
