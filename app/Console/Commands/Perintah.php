<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;

class Perintah extends Command
{
    protected $composer;
    protected $nama;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'riset:perintah
                            {start : Jalankan perintah , eg: start composer-dump, start cache-clear, start route-clear}
                            {--a|all=true : Mengeksekusi semua perintah}
                            {--c|clear-cache : Mengeksekusi perintah clear cache}
                            {--r|clear-route : Mengeksekusi perintah clear cache route}
                            {--l|clear-all : Mengeksekusi perintah semua clear}
                            {--d|dump-autoload : Mengeksekusi perintah composer dump-autoload}';

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
        // ;
        // $this->line($this->option('clear-cache'));
        
        if ($this->option('all')) {
            $this->input->setOption('clear-cache', true);

            $this->input->setOption('dump-autoload', true);
        }

        $this->start    = $this->argument('start');

        $this->makeClearCache();
        $this->makeClearRoute();
        $this->makeDumpAutoload();

        // return 0;
    }

    protected function makeClearCache()
    {
        if ($this->option('clear-cache')) {
            $this->info("[START] Clear the Application Cache..........");

            $this->call('cache:clear');
            $this->call('config:clear');

            $this->info('[DONE] Clear the Application Cache..........');
            $this->line('');
        }
    }

    protected function makeClearRoute()
    {
        if ($this->option('clear-route')) {
            $this->info("[START] Clear the Rout & View Cache..........");
            
            $this->call('route:clear');
            $this->call('view:clear');

            $this->info("[DONE] Clear the Route & View Cache..........");
        }
    }

    protected function makeDumpAutoload()
    {
        if ($this->option('dump-autoload')) {
            $this->info("[START] Dump Autoload ..........");

            $this->composer->dumpAutoloads();

            $this->info("[DONE] Dump Autoload ..........");
        }
    }

    protected function makeClearCacheAll()
    {
        if ($this->option('clear-all')) {
            $this->info("[START] Clear Cache All ..........");

            $this->input->setOption('clear-cache', 'clear-cache');

            $this->input->setOption('clear-route', 'clear-route');

            $this->info("[DONE] Clear Cache All ..........");
        }
    }
}
