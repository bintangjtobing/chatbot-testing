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
                $botman->reply("Lalu, kamu suka puisi atau tidak? Jawab `ya suka` atau jawab `tidak suka`");
            } else if ($message == 'tidak') {
                $botman->reply("Baiklah... Terima kasih sudah menyempatkan waktu untuk ada disini ya ✋.");
            } else if ($message == 'ya' || $message == 'iya') {
                $botman->reply("Belajar puisi bareng aku yuk? Ketik `Apa itu puisi?` untuk tau definisi puisi.");
            } else if ($message == 'Apa itu puisi?' || $message == 'apa itu puisi?' || $message == 'Apa itu puisi') {
                $botman->reply("Puisi atau sajak merupakan ragam sastra yang bahasanya terikat oleh irama, mantra, rima serta penyusunan larik dan bait. Biasanya puisi berisi ungkapan penulis mengenai emosi, pengalaman maupun kesan yang kemudian dituliskan dengan bahasa yang baik sehingga dapat berima dan enak untuk dibaca. Nah sekarang ajak aku mencari jenis-jenis puisi dengan ketik `jenis puisi`.");
            } else if ($message == 'jenis puisi') {
                $botman->reply("Umumnya puisi terbagi dua yaitu puisi lama dan modern. Kamu bisa pilih/ketik (puisi lama/modern) untuk melihat jenis puisi lama maupun modern.");
            } else if ($message == 'puisi lama' || $message == 'lama') {
                $botman->reply("Jenis-jenis puisi lama adalah pantun, syair, talibun, mantra dan gurindam. Sekarang kita belajar menulis puisi yuk, ketik `aku penulis`.");
            } else if ($message == 'puisi modern' || $message == 'modern') {
                $botman->reply("Jenis-jenis puisi modern itu antara lain puisi naratif, puisi lirik dan puisi deskriptif. Sekarang kita belajar menulis puisi yuk, ketik `aku penulis`.");
            } else if ($message == 'aku penulis') {
                $this->makeRhymes($botman);
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
    public function makeRhymes($botman)
    {
        $botman->ask('Nah waktunya menulis. 1.Tentukan Tema dan Judul, 2. Menentukan Kata Kunci, 3. Gunakan gaya bahasa seperti majas dan metafora, 4.Kembangkan Puisi Seindah Mungkin. 5. Tuliskan puisi karyamu disini.', function (Answer $answer) {
            $getText = $answer->getText();
            $this->say('😍😍 Wahhh puisi kamu indah. Terima kasih ya udah ngirim puisi yang bagus untuk kiraBot! 😍😍. Sesi saat ini sudah berakhir. Ada yang ingin kita diskusikan lagi?');
        });
    }
}
