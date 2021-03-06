<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;

    protected $fillable = [
        'post_id',
        'image',
        'title',
        'description',
        'body',
        'published',
        'finished',
        'views'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    protected $casts = [
        'published' => 'boolean',
        'finished'  => 'boolean'
    ];

    public function getTitle()
    {
        return $this->title;
    }

    public function children()
    {
        return $this->hasMany(Post::class, 'post_id');
    }

    public function parent()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function isPublished() {
        return (bool)$this->published;
    }
    
    public function isFinished() {
        return (bool)$this->finished;
    }
}
