<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'total_play',
        'gross',
        'handicap',
        'net',
        'seq',
    ];

    public function player_histories()
    {
        return $this->hasMany(PlayerHistory::class);
    }
}
