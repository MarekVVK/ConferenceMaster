<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    // Specify the table associated with the Conference model
    protected $table = 'conferences';

    // The attributes that are mass assignable
    // This allows these fields to be filled using mass assignment methods like create() and update()
    protected $fillable = [
        'title',        // Title of the conference
        'description',  // Description of the conference
        'date',         // Date of the conference
        'venue',        // Venue where the conference will take place
        'start_time',   // Start time of the conference
        'speakers'      // Information about the speakers at the conference
    ];

    // Enabling the use of factories for seeding fake data (useful for testing)
    use HasFactory;
}
