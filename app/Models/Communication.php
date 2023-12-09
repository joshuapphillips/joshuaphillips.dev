<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email_address',
        'content',
    ];

    protected $casts = [
        'content' => 'object',
        'notified' => 'boolean',
    ];
}
