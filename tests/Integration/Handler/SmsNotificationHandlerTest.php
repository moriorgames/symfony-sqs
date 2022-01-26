<?php

namespace App\Tests\Integration\Handler;

use App\Message\SmsNotification;
use App\Tests\Integration\IntegrationTestCase;
use Symfony\Component\Messenger\TraceableMessageBus;

class SmsNotificationHandlerTest extends IntegrationTestCase
{
    public function test_is_ok()
    {
        /** @var TraceableMessageBus $busCommand */
        $busCommand = $this->testContainer->get('messenger.default_bus');

        $result = $busCommand->dispatch(new SmsNotification('hello world'));
        dump($result);

        $this->assertTrue(true);
    }
}
