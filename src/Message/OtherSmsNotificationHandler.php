<?php

namespace App\Message;

class OtherSmsNotificationHandler
{
    public function __invoke(OtherSmsNotification $message)
    {
        echo $message->getContent() . ' .:. Other implementation' . PHP_EOL;
    }
}
