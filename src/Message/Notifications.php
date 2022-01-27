<?php

namespace App\Message;

interface Notifications
{
    public function getContent(): string;
}
