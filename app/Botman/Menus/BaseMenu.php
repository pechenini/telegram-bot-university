<?php

namespace App\Botman\Menus;

use BotMan\Drivers\Telegram\Extensions\Keyboard;
use Closure;

abstract class BaseMenu
{
    protected $rows = [];

    private $keyboard;

    protected $moveBackRef;

    protected $type = Keyboard::TYPE_KEYBOARD;

    /**
     * BaseMenu constructor.
     */
    public function __construct()
    {
        $this->keyboard = new Keyboard($this->type);
    }

    public function getMoveBackRef()
    {
        return $this->moveBackRef;
    }

    public function setMoveBackRef($moveBackRef)
    {
        $this->moveBackRef = $moveBackRef;
        return $this;
    }

    protected function type($type)
    {
        $this->type = $type;

        return $this;
    }

    public function addRow(Closure $closure)
    {
        $row = $this->rows[] = new MenuRow;

        $closure($row);
    }

    public function render()
    {
        foreach ($this->rows as $row) {
            $this->keyboard->addRow(...$row->toArray());
        }

        return $this->keyboard->resizeKeyboard(true)->toArray();
    }
}
