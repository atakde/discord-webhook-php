# discord-webhook-php

A php package for sending message to discord with webhook. Supports both text and embed messages types.

## Usage

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
