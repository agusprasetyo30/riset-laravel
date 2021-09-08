<?php

namespace App\Console\Commands;

use Composer\Composer;
use Illuminate\Console\Command;

class Perintah extends Command
{
    protected $composer;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'riset:perintah
                            {nama : nama/jenis perintah sesuai dengan request, eg: composer-dump, cache-clear, route-clear}
                            {--a|all=true : Mengeksekusi semua perintah}
                            {--c|clear-cache : Mengeksekusi perintah clear cache}
                            {--r|clear-route : Mengeksekusi perintah clear cache route}
                            {--d|dump-autoload : Mengeksekusi perintah composer dump-autoload}
                            {--u|composer-update : Mengeksekusi perintah composer update}
                            {--i|composer-install : Mengeksekusi perintah composer install}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command untuk melakukan perintah sesuai dengan request';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Composer $composer)
    {
        parent::__construct();
        $this->composer = $composer;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->input->setOption('clear-cache', true);

        // $this->makeClearCache();

        // return 0;
    }

    protected function makeClearCache()
    {
        if ($this->option('clear-cache')) {
            $this->line("Saya memilih clear cache");

        }
    }
}
