<?php

namespace App\Conversations;

use BotMan\BotMan\BotMan;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class Xkcd149 extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        return $this->ask('What? Make it yourself.', function (Answer $answer) {
            if ($answer->getText() == 'sudo make me a sandwich' || $answer->getText() == 'sudo !!') {
                if (rand(1,10) < 2) {
                    $this->say(
                        sprintf('%s is now a sandwich.', $this->bot->getUser()->getUsername())
                    );
                } else {
                    $this->say('Okay.');
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
