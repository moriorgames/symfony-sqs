<?php

namespace App\Message;

class OtherSmsNotification implements Notifications
{
    private $content;

    public function __construct(string $content)
    {
        $this->content = 'Other .:. ' . $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
