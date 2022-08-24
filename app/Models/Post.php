<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public $timestamps = true;

    protected $fillable = ['title', 'content', 'user_id'];

    /**
     * Get the user of the post.
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the comments of the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
