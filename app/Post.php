<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Carbon\Carbon;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function getBodyHtmlAttribute ($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function getExcerptHtmlAttribute ($value)
    {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }

    public function getDateAttribute ($value)
    {
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function author ()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
