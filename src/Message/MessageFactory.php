<?php

namespace Atakde\DiscordWebhook\Message;

class MessageFactory
{
    /**
     * @param string $type
     * @return EmbedMessage|TextMessage
     */
    public static function create(string $type): TextMessage|EmbedMessage
    {
        return match ($type) {
            'text' => new TextMessage(),
            'embed' => new EmbedMessage(),
            default => throw new \InvalidArgumentException('Invalid message type'),
        };
    }
}
