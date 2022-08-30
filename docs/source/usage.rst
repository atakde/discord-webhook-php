Usage
=====

.. _installation:

Installation
------------

To use discord-webhook-php, first install it using composer:

.. code-block:: php

   composer require atakde/discord-webhook-php

For example:

.. code-block:: php

    composer require atakde/discord-webhook-php

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


