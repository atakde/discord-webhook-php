<?php

declare(strict_types=1);

namespace Atakde\DiscordWebhook\Message;

class EmbedMessage extends Message
{
    private ?string $title  = null;
    private ?string $description  = null;
    private ?string $color  = null;
    private ?string $footerIcon  = null;
    private ?string $footerText = null;
    private ?string $thumbnailUrl = null;
    private ?string $url = null;
    private ?string $imageUrl = null;
    private ?string $timestamp = null;
    private ?string $authorName = null;
    private ?string $authorUrl = null;
    private ?string $authorIcon = null;
    private array $fields = [];

    /**
     * @param string|null $title
     * @return EmbedMessage
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string|null $description
     * @return EmbedMessage
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string|null $color
     * @return EmbedMessage
     */
    public function setColor(?string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param string|null $footerIcon
     * @return EmbedMessage
     */
    public function setFooterIcon(?string $footerIcon): self
    {
        $this->footerIcon = $footerIcon;
        return $this;
    }

    /**
     * @param string|null $footerText
     * @return EmbedMessage
     */
    public function setFooterText(?string $footerText): self
    {
        $this->footerText = $footerText;
        return $this;
    }

    /**
     * @param string|null $thumbnailUrl
     * @return EmbedMessage
     */
    public function setThumbnailUrl(?string $thumbnailUrl): self
    {
        $this->thumbnailUrl = $thumbnailUrl;
        return $this;
    }

    /**
     * @param string|null $url
     * @return EmbedMessage
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param string|null $imageUrl
     * @return EmbedMessage
     */
    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @param string|null $timestamp
     * @return EmbedMessage
     */
    public function setTimestamp(?string $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @param string|null $authorName
     * @return EmbedMessage
     */
    public function setAuthorName(?string $authorName): self
    {
        $this->authorName = $authorName;
        return $this;
    }

    /**
     * @param string|null $authorUrl
     * @return EmbedMessage
     */
    public function setAuthorUrl(?string $authorUrl): self
    {
        $this->authorUrl = $authorUrl;
        return $this;
    }

    /**
     * @param string|null $authorIcon
     * @return EmbedMessage
     */
    public function setAuthorIcon(?string $authorIcon): self
    {
        $this->authorIcon = $authorIcon;
        return $this;
    }

    /**
     * @param array $fields
     * @return EmbedMessage
     */
    public function setFields(array $fields): self
    {
        $this->fields = $fields;
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
            'embeds' => [
                [
                    'title' => $this->title,
                    'description' => $this->description,
                    'url' => $this->url,
                    'timestamp' => $this->timestamp,
                    'color' => $this->color,
                    'footer' => [
                        'text' => $this->footerText,
                        'icon_url' => $this->footerIcon
                    ],
                    'thumbnail' => [
                        'url' => $this->thumbnailUrl
                    ],
                    'image' => [
                        'url' => $this->imageUrl
                    ],
                    'author' => [
                        'name' => $this->authorName,
                        'url' => $this->authorUrl,
                        'icon_url' => $this->authorIcon
                    ],
                    'fields' => $this->fields
                ]
            ]
        ];
    }
}
