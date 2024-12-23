<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'slug', 'image', 'report', 'user_id'
    ];

    // Define a relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);  // This line creates the relationship with the User model
    }
}
