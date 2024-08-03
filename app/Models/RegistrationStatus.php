<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationStatus extends Model
{
    use HasFactory;

    protected $table = 'registration_status';
    public $timestamps = false;

    protected $fillable = [
        'is_active',
        'limit_peserta'
    ];
}
