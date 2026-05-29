<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [

    'title',
    'author',
    'year',
    'description',
    'cover',
    'file_path',
    'category_id'
];
    
public function bookmarks()
{
    return $this->hasMany(Bookmark::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function readHistories()
{
    return $this->hasMany(ReadHistory::class);
}

    }

