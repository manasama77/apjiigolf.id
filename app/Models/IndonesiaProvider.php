<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndonesiaProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefix',
        'provider',
    ];
}
