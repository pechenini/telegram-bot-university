<?php

namespace App\Botman\Menus;

class MainMenu extends BaseMenu
{

    public function run()
    {
        $this->addRow(
            function (MenuRow $row) {
                $row->addButton('Поступление');
            }
        );

        $this->addRow(
            function (MenuRow $row) {
                $row->addButton('Об университете');
            }
        );
    }
}
