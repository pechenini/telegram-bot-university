<?php

if (!function_exists("message")) {
    function message($view, $attributes = [])
    {
        return view("botman::$view", $attributes)->render();
    }
}

if (!function_exists("commands")) {
    function commands($handler)
    {
        return "App\\Botman\\Commands\\$handler";
    }
}
