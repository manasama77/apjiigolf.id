<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'event_location_id',
        'out',
        'in',
        'gross',
        'handicap',
        'net',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function event_location()
    {
        return $this->belongsTo(EventLocation::class);
    }
}
