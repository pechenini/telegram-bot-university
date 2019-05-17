<?php

use Illuminate\Database\Seeder;

class MainMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Menu::create([
            'label' => \App\Services\MenuResolver::MAIN_MENU_LABEL,
            'parent_id' => null
        ]);
    }
}
