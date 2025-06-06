<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'event_id', 'quantity'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
