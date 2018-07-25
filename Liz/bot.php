<?php
require 'vendor/autoload.php';

use App\Conversations\ExampleConversation;
use React\EventLoop\Factory;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Slack\SlackRTMDriver;

// Load driver
DriverManager::loadDriver(SlackRTMDriver::class);

$loop = Factory::create();
/** @var \BotMan\BotMan\BotMan $botman */
$botman = BotManFactory::createForRTM([
    'slack' => [
        'token' => env('slack_token', 'put the token in here, I didnt load dotenv'),
    ],
], $loop);

$botman->hears('.*(barry|larry).*', function (\BotMan\BotMan\BotMan $botman) {
    $botman->typesAndWaits(2);
    $botman->reply('Did you mean, Harry?');
});

$botman->hears('.*(!aloe).*', function (\BotMan\BotMan\BotMan $botman) {
    $botman->typesAndWaits(2);
    $botman->reply('https://twitter.com/Aloe_Cam');
});

//$botman->hears('.*liz.*xkcd|xkcd.*liz.*', function (\BotMan\BotMan\BotMan $botman) {
//    $botman->reply('/xkcd random');
//});

$botman->hears('make me a sandwich', function (\BotMan\BotMan\BotMan $botman) {
    $botman->typesAndWaits(2);
    $botman->startConversation(new \App\Conversations\Xkcd149());
});

$botman->hears('.*(graham|campbell|styleci|style ci).*', function (\BotMan\BotMan\BotMan $botman) {
    $botman->reply(':styleci:');
});

$botman->hears('.*(nice).*', function (\BotMan\BotMan\BotMan $botman) {
    $botman->reply('_nice_');
});

$loop->run();