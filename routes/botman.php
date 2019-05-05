<?php

use BotMan\BotMan\BotMan;
/** @var BotMan $botman */
$botman = resolve('botman');

$botman->hears("Привет", commands('MainCommand@index'));

$botman->hears("1", commands('MainCommand@kb'));

$botman->fallback(function(BotMan $bot) {
    $bot->reply('Я не знаю такой команды');
});
