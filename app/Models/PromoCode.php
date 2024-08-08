<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'code',
        'name',
        'is_used',
        'tipe', // promo / compliment
    ];

    public function getIsUsedBadgeAttribute()
    {
        $is_used = $this->is_used;

        if ($is_used) {
            $badge = '<div class="badge badge-success">USED</div>';
        } else {
            $badge = '<div class="badge badge-danger">NOT USED</div>';
        }

        return $badge;
    }

    public function getIsUsedTextAttribute()
    {
        return $this->is_used ? "USED" : "NOT USED";
    }

    public function getTipeBadgeAttribute()
    {
        $tipe = strtoupper($this->tipe);
        return $tipe == 'PROMO' ? '<div class="badge badge-info">' . $tipe . '</div>' : '<div class="badge badge-warning">' . $tipe . '</div>';
    }

    public function getTipeTextAttribute()
    {
        return strtoupper($this->tipe);
    }
}
