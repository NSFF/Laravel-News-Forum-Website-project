<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public $timestamps = true;

    protected $fillable = ['content', 'user_id', 'post_id'];

    /**
     * Get the post of the comment.
     */
    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * Get the user of the comment.
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
