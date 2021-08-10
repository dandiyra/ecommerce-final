<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model 
{
    protected $filable = [

    ];

    public const PAYMENT_CHANNELS = ['bca_klikbca', 'bca_klikpay'];

    public const EXPIRY_DURATION = 2;
    public const EXPIRY_UNIT = 'days';

    public const CHALLENGE = 'challenge';
    public const SUCCESS = 'success';
    public const SETTLEMENT = 'settlement';
    public const PENDING = 'pending';
    public const DENY = 'deny';
    public const EXPIRE = 'expire';
    public const CANCEL = 'cancel';

    public const PAYMENTCODE = 'PAY';

}