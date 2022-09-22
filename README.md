# discord-webhook-php

A php package for sending message to discord with webhook. Supports both text and embed messages types.

## Installation

Install via composer

```bash 
composer require atakde/discord-webhook-php
```

## Usage (Text Message)

```php

require 'vendor/autoload.php';

use Atakde\DiscordWebhook\DiscordWebhook;
use Atakde\DiscordWebhook\Message\MessageFactory;

$messageFactory = new MessageFactory();
$textMessage = $messageFactory->create('text');
$textMessage->setUsername("John Doe");
$textMessage->setContent("Hello World!");

$webhook = new DiscordWebhook($textMessage);
$webhook->setWebhookUrl("https://discord.com/api/...");
$webhook->send();

```

## Usage (Embed Message)

```php
$embedMessage = $messageFactory->create('embed');
$embedMessage->setAvatarUrl("https://doodleipsum.com/700?i=f8b1abea359b643310916a38aa0b0562");
$embedMessage->setContent("Hello World!");
$embedMessage->setUsername("John Doe");
$embedMessage->setTitle("Title");
$embedMessage->setDescription("Description");
$embedMessage->setUrl("https://doodleipsum.com/700?i=f8b1abea359b643310916a38aa0b0562");
$embedMessage->setColor(0x00ff00);
$embedMessage->setTimestamp(date("Y-m-d", strtotime("now")));
$embedMessage->setFooterIcon("https://doodleipsum.com/700?i=f8b1abea359b643310916a38aa0b0562");
$embedMessage->setFooterText("Footer Text");
$embedMessage->setImageUrl("https://doodleipsum.com/700?i=f8b1abea359b643310916a38aa0b0562");
$embedMessage->setThumbnailUrl("https://doodleipsum.com/700?i=f8b1abea359b643310916a38aa0b0562");
$embedMessage->setAuthorName("Author Name");
$embedMessage->setAuthorUrl("https://doodleipsum.com/700?i=f8b1abea359b643310916a38aa0b0562");
$embedMessage->setAuthorIcon("https://doodleipsum.com/700?i=f8b1abea359b643310916a38aa0b0562");
$embedMessage->setFields([
    [
        'name' => 'Field 1',
        'value' => 'Value 1',
        'inline' => true
    ],
    [
        'name' => 'Field 2',
        'value' => 'Value 2',
        'inline' => false
    ]
]);

$webhook = new DiscordWebhook($embedMessage);
$webhook->setWebhookUrl("https://discord.com/api/...");
$webhook->send();
```
