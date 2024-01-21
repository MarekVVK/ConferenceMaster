<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',         // Name of the user
        'email',        // Email address of the user
        'password',     // Hashed password of the user
        'role',         // Role of the user (e.g., client, employee, admin)
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',         // Hide password from serialization
        'remember_token',   // Hide remember_token from serialization
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',    // Cast email_verified_at to datetime
        'password' => 'hashed',               // Cast password as hashed
    ];

    /**
     * Check if the user is registered for a specific conference.
     *
     * @param  Conference $conference  The conference to check registration for
     * @return bool                    True if the user is registered, false otherwise
     */
    public function isRegisteredForConference($conference)
    {
        // Assuming a many-to-many relationship with Conference model
        return $this->conferences()->where('conference_id', $conference->id)->exists();
    }

    /**
     * Define the many-to-many relationship between User and Conference models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function conferences()
    {
        return $this->belongsToMany(Conference::class);
    }
}
