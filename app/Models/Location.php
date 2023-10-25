<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact',
        'out',
        'in',
        'banner',
    ];

    public function event_location()
    {
        return $this->hasMany(EventLocation::class);
    }

    public function player_history()
    {
        return $this->hasManyThrough(PlayerHistory::class, EventLocation::class);
    }

    public function getBannerPathAttribute()
    {
        $banner = $this->getRawOriginal('banner');
        return '<img src="' . Storage::url($banner) . '" class="img-thumbnail" style="max-width: 100px;" />';
    }
}
