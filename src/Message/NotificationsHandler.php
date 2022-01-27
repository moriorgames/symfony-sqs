<?php

namespace App\Message;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

#[AsMessageHandler]
class NotificationsHandler implements MessageSubscriberInterface
{
    public function __invoke(Notifications $message)
    {
        $class = get_class($message) . 'Handler';
        (new $class())->__invoke($message);
    }

    public static function getHandledMessages(): iterable
    {
        yield SmsNotification::class;
        yield OtherSmsNotification::class;
    }
}
