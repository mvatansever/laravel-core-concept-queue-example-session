<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'sender_email_address',
        'title',
        'content',
    ];

    public function getId()
    {
        return $this->getKey();
    }

    public function getTitle()
    {
        return $this->getAttributeValue('title');
    }

    public function getContent()
    {
        return $this->getAttributeValue('content');
    }

    public function mailReceivers()
    {
        return $this->hasMany(MailReceiver::class);
    }
}
