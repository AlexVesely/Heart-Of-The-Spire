<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Comment Model
 * Represents a comment made by a user on a post.
 */
class Comment extends Model
{
    use HasFactory;
    
    /**
     * Get the profile that created this comment.
     * 
     * One-to-Many relationship:
     * A profile can have many comments but a comment belongs to one profile.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Get the post that this comment is on.
     * 
     * One-to-Many relationship:
     * A post can have many comments but a comment belongs to one post.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
