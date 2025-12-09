<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * User Model
 * 
 * Represents a user of the application.
 * This model comes with Laravel but has been adjusted to have a relationship to the Profile model.
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the profile associated with the user.
     *
     * One-to-One relationship: Each user has exactly one profile.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Automatically create a Profile whenever a new User is registered.
     * Overrides eloquent's booted() method to automatically trigger this method when a new
     * user is created.
     */
    protected static function booted()
    {
        // Runs this function right after a new User is added to the database.
        static::created(function ($user) {
            Profile::create([
                'user_id' => $user->id, // Connect the new profile with this user
                'profile_name' => fake()->userName(),
                'is_admin' => false,
                'bio' => 'Hi, I am new to Heart of the Spire! I hope you have a lovely day!',
                'fav_class' => fake()->randomElement(['ironclad','silent','defect','watcher']), // default value
            ]);
        });
    }

}
