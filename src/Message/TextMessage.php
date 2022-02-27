<?php

declare(strict_types=1);

namespace Atakde\DiscordWebhook\Message;

class TextMessage extends Message
{
    private ?string $username = null;
    private ?string $content = null;
    private ?string $avatarUrl = null;
    private bool $tts = false;

    /**
     * @param string|null $username
     * @return TextMessage
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string|null $content
     * @return TextMessage
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param string|null $avatarUrl
     * @return TextMessage
     */
    public function setAvatarUrl(?string $avatarUrl): self
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    /**
     * @param bool $tts
     * @return TextMessage
     */
    public function setTts(bool $tts): self
    {
        $this->tts = $tts;
        return $this;
    }

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
