<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'invoice_number',
        'full_name',
        'gender',
        'email',
        'whatsapp_number',
        'company_name',
        'position',
        'institution',
        'institution_etc',
        'shirt_size',
        'event_location_id',
        'ticket_type',
        'promo_code',
        'ticket_price',
        'admin_fee',
        'total_price',
        'payment_status', // pending success expired
        'barcode',
        'seq',
        'eticket',
        'token_id',
        'url',
        'expired_date',
        'notification',
        'is_checkin',
        'is_winner',
    ];

    public function eventLocation()
    {
        return $this->belongsTo(EventLocation::class);
    }

    public function getTicketTypeTextAttribute()
    {
        return $this->ticket_type == 'early bird' ? 'MEMBER' : 'REGULAR';
    }

    public function getExpiredDateFormattedAttribute()
    {
        return Carbon::parse($this->expired_date)->format('Y-m-d H:i:s');
    }

    public function getIsCheckInTextAttribute()
    {
        return $this->is_checkin ? 'CHECKED IN' : 'NOT CHECKED IN';
    }
}
