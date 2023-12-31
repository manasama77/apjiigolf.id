<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'gender',
        'email',
        'whatsapp_number',
        'company_name',
        'position',
        'institution',
        'institution_etc',
        'order_id',
        'ticket_price',
        'admin_fee',
        'total_price',
        'payment_status',
        'snap_token',
        'barcode',
        'seq',
    ];
}
