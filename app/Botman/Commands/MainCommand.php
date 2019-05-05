<?php

namespace App\Botman\Commands;

use BotMan\BotMan\BotMan;

class MainCommand
{
    public function index(BotMan $bot)
    {
        $bot->reply("Привет!");
    }

    public function kb(BotMan $bot)
    {
        $keyboard = menu('main');
        $bot->reply("Hey", [] + $keyboard);
    }
}