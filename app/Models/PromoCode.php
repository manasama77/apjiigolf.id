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
}
