<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
}
