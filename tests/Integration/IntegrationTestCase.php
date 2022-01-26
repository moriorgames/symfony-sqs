<?php

namespace App\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\TestContainer;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Dotenv\Dotenv;


class IntegrationTestCase extends WebTestCase
{
    /** @var TestContainer */
    protected $testContainer;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();

        // returns the real and unchanged service container
        $container = self::$kernel->getContainer();

        // gets the special container that allows fetching private services
        $this->testContainer = self::$container;

        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../.env');
        foreach ($_ENV as $var => $value) {
            putenv($var . '=' . $value);
        }
    }
}
