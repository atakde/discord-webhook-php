<?php

declare(strict_types=1);

namespace Atakde\DiscordWebhook\Message;

abstract class Message
{
    protected ?string $username = null;
    protected ?string $content = null;
    protected ?string $avatarUrl = null;
    protected bool $tts = false;

    abstract public function toArray(): array;
    abstract public function toJson(): string;

    public function isMultiPart(): bool
    {
        return false;
    }

    /**
     * @param bool $tts
     * @return FileMessage
     */

    public function setTts(bool $tts): self
    {
        $this->tts = $tts;
        return $this;
    }

    /**
     * @param string $content
     * @return FileMessage
     */

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param string|null $username
     * @return EmbedMessage
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string|null $avatarUrl
     * @return EmbedMessage
     */
    public function setAvatarUrl(?string $avatarUrl): self
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }
}
