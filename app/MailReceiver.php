<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailReceiver extends Model
{
    protected $fillable = [
        'mail_id',
        'mail_address',
    ];

    public $timestamps = false;

    public function getId()
    {
        return $this->getKey();
    }

    public function getMailAddress()
    {
        return $this->getAttributeValue('mail_address');
    }

    public function mail()
    {
        return $this->belongsTo(Mail::class);
    }
}
