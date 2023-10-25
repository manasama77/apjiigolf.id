<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'total_play',
        'gross',
        'handicap',
        'net',
        'seq',
    ];
}
