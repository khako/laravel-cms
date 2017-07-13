<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getDateAttribute ($value)
    {
        return $this->created_at->diffForHumans();
    }

    public function author ()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLatestFirst($query)
    {
        $query->orderBy('created_at', 'desc');
    }
}
