<?php

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;

include __DIR__.'/vendor/autoload.php';

$discord = new Discord([
    'token' => 'BOT TOKEN HERE',
    'intents' => Intents::getDefaultIntents()
]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

    $discord->on(Event::MESSAGE_CREATE, function (Message $message) {
        $loweredMessage = strtolower($message->content);

        $quoi = [
            'quoi',
            'qoi',
            'koi',
            'wat',
            'what'
        ];

        foreach ($quoi as $value) {
            if(strstr($loweredMessage, $value)) {
                $message->channel->sendMessage("Ffeur");
                return;
            }
        }

    });
});

$discord->run();
