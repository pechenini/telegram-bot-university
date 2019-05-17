<?php

namespace App\Botman\Commands;

use App\Models\Menu;
use App\Services\MenuResolver;
use BotMan\BotMan\BotMan;

class MainCommand
{
    /**
     * @var MenuResolver
     */
    private $resolver;

    public function __construct(MenuResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function index(BotMan $bot)
    {
        $response = $this->resolver->resolve($bot->getMessage()->getText());
        $bot->reply($response->message, $response->menu->render());
    }
}
