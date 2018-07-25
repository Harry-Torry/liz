<?php

namespace App\Http\Controllers\Utility;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class PersonController extends Controller
{
    public function handle(BotMan $bot)
    {
        $bot->hears('Harry', function(BotMan $bot) {
            $bot->reply('I heard Harry');
        });
    }

}
