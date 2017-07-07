<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailReceiver extends Model
{
    protected $fillable = [
        'mail_id',
        'email_address',
    ];

    public $timestamps = false;
}
