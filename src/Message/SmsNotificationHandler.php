<?php

namespace App\Message;

class SmsNotificationHandler
{
    public function __invoke(SmsNotification $message)
    {
        echo $message->getContent() . PHP_EOL;
    }
}
