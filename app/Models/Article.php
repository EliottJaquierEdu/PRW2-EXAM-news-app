<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'published_at', 'archived_at', 'views'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeUnarchived(Builder $query)
    {
        $query->whereNull('archived_at');
    }

    public function scopeArchived(Builder $query)
    {
        $query->whereNotNull('archived_at');
    }

    public function scopeSearchBody(Builder $query, $search)
    {
        $query->where('body', 'LIKE', "%$search%");
    }

    public function incrementViewCount()
    {
        $this->update(['views' => $this->views + 1]);
    }

    public function archive()
    {
        $this->timestamps = false;
        $this->update(['archived_at' => now()]);
        $this->timestamps = true;
    }
}
