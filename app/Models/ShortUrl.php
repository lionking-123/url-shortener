<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $table = 'urls';

    protected $fillable = [
        'hash',
        'url',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'hash' => 'string',
        'url' => 'string',
    ];
}
