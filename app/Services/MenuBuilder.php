<?php


namespace App\Services;


use App\Botman\Menus\Menu;
use App\Botman\Menus\MenuRow;

class MenuBuilder
{
    public function build($menuRows)
    {
        $menu = new Menu();
        dump($menuRows);
        foreach ($menuRows as $menuRow) {
            $menu->addRow(function (MenuRow $row) use ($menuRow) {
                $row->addButton($menuRow->label);
            });
        }
        return $menu;
    }



    public function addMainMenuLink(Menu $menu)
    {
        $menu->addRow(function (MenuRow $row) {
            $row->addButton(MenuResolver::MAIN_MENU_LABEL);
        });
    }
}