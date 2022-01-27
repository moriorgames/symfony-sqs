<?php

namespace App\Handler;

use App\Message\OtherSmsNotification;
use App\Message\SmsNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

#[AsMessageHandler]
class SmsNotificationHandler implements MessageSubscriberInterface
{
    public function __invoke(SmsNotification $message)
    {
        echo $message->getContent() . PHP_EOL;
    }

    public function handleOtherSmsNotification(OtherSmsNotification $message)
    {
        echo $message->getContent() . PHP_EOL;
    }

    public static function getHandledMessages(): iterable
    {
        // handle this message on __invoke
        yield SmsNotification::class;

        // also handle this message on handleOtherSmsNotification
        yield OtherSmsNotification::class => [
            'method' => 'handleOtherSmsNotification',
            //'priority' => 0,
            //'bus' => 'messenger.bus.default',
        ];
    }
}
