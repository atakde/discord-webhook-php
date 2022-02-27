<?php

namespace Atakde\DiscordWebhook\Message;

abstract class Message
{
    abstract public function toArray(): array;
    abstract public function toJson(): string;
}
