<?php

declare(strict_types=1);

namespace Atakde\DiscordWebhook\Message;

use InvalidArgumentException;

class MessageFactory
{
    /**
     * @param string $type
     * @return EmbedMessage|TextMessage
     */
    public static function create(string $type): TextMessage|EmbedMessage|FileMessage
    {
        return match ($type) {
            'text' => new TextMessage(),
            'embed' => new EmbedMessage(),
            'file' => new FileMessage(),
            default => throw new InvalidArgumentException('Invalid message type'),
        };
    }
}
