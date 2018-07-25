<?php
use App\Http\Controllers\BotManController;

/** @var \BotMan\BotMan\BotMan $botman */
$botman = resolve('botman');

$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('Harry', function(\BotMan\BotMan\BotMan $botMan) {
   $botMan->reply('Yeah Harry is the bets');
});

$botman->getMessage('{name}'. \App\Http\Controllers\Utility\PersonController::class.'@handle');