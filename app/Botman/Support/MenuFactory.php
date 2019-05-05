<?php


namespace App\Botman\Support;


use App\Botman\Menus\BaseMenu;

class MenuFactory
{
    protected $menus;

    /**
     * @param $alias
     * @param $menu
     */
    public function addMenu($alias, BaseMenu $menu)
    {
        $this->menus[$alias] = $menu;
    }

    /**
     * @param $alias
     * @return mixed
     * @throws \Exception
     */
    public function get($alias)
    {
        if (array_key_exists($alias, $this->menus)) {
            return $this->menus[$alias];
        } else {
            throw new \Exception('Menu not found');
        }
    }
}