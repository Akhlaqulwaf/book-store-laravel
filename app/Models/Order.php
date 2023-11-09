<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'invoice',
        'user_id',
        'subtotal',
        'pesan',
        'status_order_id',
        'metode_pembayaran',
        'bukti_bayar'
    ];
}
