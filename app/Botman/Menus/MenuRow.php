<?php

namespace App\Botman\Menus;

use BotMan\Drivers\Telegram\Extensions\KeyboardButton;
use Illuminate\Contracts\Support\Arrayable;

class MenuRow implements Arrayable
{
    protected $buttons;

    /**
     * @param $title
     * @param null  $url
     * @param null  $callbackData
     * @param null  $requestLocation
     * @param null  $requestContact
     * @return $this
     */
    public function addButton($title, $url = null, $callbackData = null, $requestLocation = null, $requestContact = null)
    {
        $this->buttons[] = KeyboardButton::create($title)
            ->requestLocation($requestLocation)
            ->requestContact($requestContact)
            ->callbackData($callbackData)
            ->url($url);

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(
            function ($item) {
                return $item;
            }, $this->buttons
        );
    }
}
