<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    // Définir les champs qui peuvent être remplis par masse
    protected $fillable = ['name', 'email', 'telephone', 'sujet', 'message'];
}
