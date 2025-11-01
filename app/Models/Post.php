<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Post Model
 * Represents a post created by a profile. Posts can be about card(s) and can have comments.
 */
class Post extends Model
{
    use HasFactory;
    
    /**
     * Get the profile that created this post.
     * 
     * One-to-Many relationship:
     * A profile can create many posts but each post belongs to one profile.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }


    /**
     * Get the comments associated with this post.
     *
     * One-to-Many relationship: A post can have many comments,
     * each comment belongs to this post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /** 
     * Get the cards on this post.
     * 
     * Many-to-Many relationship: 
     * A post can include many cards, and a card can be in many posts.
     */
    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }
}
