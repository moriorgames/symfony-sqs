<?php

namespace App\Tests\Integration\Handler;

use App\Message\OtherSmsNotification;
use App\Message\SmsNotification;
use App\Tests\Integration\IntegrationTestCase;
use Symfony\Component\Messenger\TraceableMessageBus;

class SmsNotificationHandlerTest extends IntegrationTestCase
{
    /** @var TraceableMessageBus */
    private $bus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bus = $this->testContainer->get('messenger.default_bus');
    }

    public function test_is_able_to_produce_sms_notification()
    {
        $expected = 'My message';
        $result = $this->bus->dispatch(new SmsNotification($expected));

        /** @var SmsNotification $message */
        $message = $result->getMessage();

        $this->assertEquals($expected, $message->getContent());
    }

    public function test_is_able_to_produce_other_sms_notification()
    {
        $expected = 'My message';
        $result = $this->bus->dispatch(new OtherSmsNotification($expected));

        /** @var SmsNotification $message */
        $message = $result->getMessage();

        $this->assertStringContainsString($expected, $message->getContent());
    }
}
