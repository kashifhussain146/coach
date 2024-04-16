<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    protected $table = 'payment_details';
    protected $fillable = ['question_id', 'user_id', 'order_id', 'amount', 'payment_date', 'tracking_id', 'bank_ref_no', 'order_status', 'payment_status', 'card_name', 'card_last4', 'card_network', 'card_type', 'email', 'contact', 'card_id'];
}
