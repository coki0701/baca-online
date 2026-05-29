<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadHistory extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
    ];

    //relasi user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relasi buku

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}