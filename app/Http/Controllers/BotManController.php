<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'halo') {
                $this->askName($botman);
            } else if ($message == 'ya saya juga' || $message == 'terima kasih') {
                $botman->reply("Kamu suka puisi atau tidak?");
            } else if ($message == 'ya saya suka' ||  $message == 'Benar saya suka') {
                $botman->reply("Baiklah...");
            } else {
                $botman->reply("ketik 'halo' untuk memulai percakapan dengan bot...");
            }
        });

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! Aku bisa manggil kamu dengan sebutan apa nih?', function (Answer $answer) {
            $name = $answer->getText();
            $this->say('Halo ' . $name . ', senang ngobrol dengan kamu!');
        });
    }
}
