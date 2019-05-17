<?php


namespace App\Dto;


class ChatResponse
{
    public $message;
    public $menu;
    
    public function __construct($message, $menu)
    {
        $this->message = $message;
        $this->menu = $menu;
    }
}