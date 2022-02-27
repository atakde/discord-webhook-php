<?php

declare(strict_types=1);

use Atakde\DiscordWebhook\Message\EmbedMessage;
use Atakde\DiscordWebhook\Message\TextMessage;
use PHPUnit\Framework\TestCase;

final class MessageFactoryTest extends TestCase
{
    public function testSimple()
    {
        $messageFactory = new \Atakde\DiscordWebhook\Message\MessageFactory();
        $textMessage = $messageFactory->create("text");
        $embedMessage = $messageFactory->create("embed");

        $this->assertInstanceOf(TextMessage::class, $textMessage);
        $this->assertInstanceOf(EmbedMessage::class, $embedMessage);
    }
}
