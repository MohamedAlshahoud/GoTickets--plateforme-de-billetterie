<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Autoriser les champs à être remplis via assignation de masse
    protected $fillable = [
        'title',
        'location',
        'date',
        'description',
        'price',
        'image_path',
        
    ];
}
