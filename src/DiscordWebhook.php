<?php

namespace Atakde\DiscordWebhook;

use Atakde\DiscordWebhook\Message\Message;

/**
 * DiscordWebhook
 * @author Atakan Demircioğlu
 * @version 1.0
 * @package DiscordWebhook
 */

class DiscordWebhook
{
    /**
     * @var Message $message
     */
    private Message $message;

    /**
     * @var string $webhookUrl
     */
    private string $webhookUrl;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function setWebhookUrl(string $webhookUrl): void
    {
        $this->webhookUrl = $webhookUrl;
    }

    public function send(): void
    {
        try {
            $ch = curl_init($this->webhookUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->message->toJson());
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($this->message->toJson())
            ));
            $response = curl_exec($ch);
            $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($responseCode != 200) {
                var_dump($response);
                throw new InvalidResponseException("Error !!");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
