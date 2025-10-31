<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
