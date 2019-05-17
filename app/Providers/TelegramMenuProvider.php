<?php

namespace App\Providers;

use App\Botman\Menus\Menu;
use App\Botman\Support\MenuFactory;
use Illuminate\Support\ServiceProvider;

class TelegramMenuProvider extends ServiceProvider
{
    private $menus = [
        'main' => Menu::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMenuFactory();
        $this->registerMenus();
    }

    private function registerMenus()
    {
        foreach ($this->menus as $alias => $menu) {
            app('menus')->addMenu($alias, new $menu);
        }
    }

    private function registerMenuFactory()
    {
        $this->app->singleton('menus', MenuFactory::class);
    }
}
