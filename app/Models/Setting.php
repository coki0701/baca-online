<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'description',
        'footer',
        'email',
        'phone',
        'address',
        'open_hours'
    ];
}