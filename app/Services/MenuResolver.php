<?php


namespace App\Services;


use App\Dto\ChatResponse;
use App\Models\Menu;

class MenuResolver
{
    public const MAIN_MENU_LABEL = 'Главное меню';
    private $builder;

    public function __construct(MenuBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function resolve(string $label)
    {
        $menu = Menu::whereLabel($label)->first();

        if (!$menu) {
            $menu = $this->getMainMenu();
        }

        $nextMenuRows = $menu->children;
        $keyboard = $this->builder->build($nextMenuRows);
        if (!$this->onMainMenu($label)) {
            $this->builder->addMainMenuLink($keyboard);
        }
        return new ChatResponse($menu->message->content, $keyboard);
    }

    public function getMainMenu()
    {
        return  Menu::whereLabel(self::MAIN_MENU_LABEL)->first();
    }

    public function onMainMenu(string $label): bool
    {
        return $label == self::MAIN_MENU_LABEL;
    }
}