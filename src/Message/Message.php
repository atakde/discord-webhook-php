<?php

declare(strict_types=1);

namespace Atakde\DiscordWebhook\Message;

abstract class Message
{
    abstract public function toArray(): array;
    abstract public function toJson(): string;
}
