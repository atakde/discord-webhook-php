<?php

declare(strict_types=1);

namespace Atakde\DiscordWebhook\Message;

class TextMessage extends Message
{
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'content' => $this->content,
            'avatar_url' => $this->avatarUrl,
            'tts' => $this->tts,
        ];
    }
}
