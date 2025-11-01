<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Card Model
 * Represents a Slay the Spire card.
 */
class Card extends Model
{
    use HasFactory;

    /**
     * Get the posts that reference this card.
     * 
     * Many-to-Many relationship: 
     * A card can appear in multiple posts, and a post can contain multiple cards.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
