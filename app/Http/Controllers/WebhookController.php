<?php

namespace App\Http\Controllers;

class WebhookController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
        $botman->listen();
    }
}
