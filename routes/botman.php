<?php

use BotMan\BotMan\BotMan;
/** @var BotMan $botman */
$botman = resolve('botman');


$menus = \App\Models\Menu::all();

foreach ($menus as $menu) {
    $botman->hears($menu->label, commands('MainCommand@index'));
}

$botman->fallback(function(BotMan $bot) {
    $bot->reply('Я не знаю такой команды');
});
