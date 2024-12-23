<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'title',
        'abstract',
        'content',
        'author',
        'user_id',
    ];

    // If you need any relationships, you can define them here.
    // For example, if you have a user associated with the paper:
     public function user()
        {
            return $this->belongsTo(User::class);
        }
}
