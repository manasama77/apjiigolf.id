<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventLocation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'location_id',
        'start_date',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function player_history()
    {
        return $this->hasMany(PlayerHistory::class);
    }

    public function getStartDateHuman()
    {
        $start_date = $this->getRawOriginal('start_date');
        return Carbon::parse($start_date)->diffForHumans();
    }

    public function getIsActiveBadgeAttribute()
    {
        $is_active = $this->getRawOriginal('is_active');
        if ($is_active == 1) {
            return '<span class="badge badge-success">Active</span>';
        } else {
            return '<span class="badge badge-danger">Inactive</span>';
        }
    }
}
