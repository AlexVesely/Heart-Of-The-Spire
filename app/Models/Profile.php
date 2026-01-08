<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Profile Model
 * Represents a user's profile on the web app.
 */
class Profile extends Model
{
    use HasFactory;

    // Allow these fields to be fillable (So that User booted() works)
    protected $fillable = [
        'user_id',
        'profile_name',
        'is_admin',
        'bio',
        'fav_class',
        'profile_img_id'
    ];

    /**
     * Get the user whose profile this belong to.
     *
     * One-to-One relationship: Each profile belongs to one user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all posts created by this profile
     * 
     * One-to-Many relationship: A profile can create many posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all comments made by this profile.
     *
     * One-to-Many relationship: A profile can create many comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
