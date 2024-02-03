<?php

namespace App\Models;

use App\Enums\CommunicationTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'content',
    ];

    protected $casts = [
        'type' => CommunicationTypes::class,
        'content' => 'object',
        'notified' => 'boolean',
    ];
}
