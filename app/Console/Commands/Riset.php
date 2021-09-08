<?php

namespace App\Console\Commands;

use Composer\Composer;
use Illuminate\Console\Command;

class Riset extends Command
{
    protected $perintah;
    protected $namespace;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'riset:mencoba 
                                {--a|all=true : Mengeksekusi semua perintah}';
                                // {perintah : nama perintah seperti hapus cache, dump autoload dll}
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mencoba beberapa konfigurasi pada command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Composer $composer)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tanya = $this->ask("Mencoba tanya"); // tanya

        $this->info($tanya); // ijo
        $this->line($tanya); // biasa
        $this->error($tanya); // error

        // $this->perintah = $this->argument("perintah");
        // $this->namespace = $this->option('namespace');

        // $this->line($this->perintah); // biasa
        $this->confirm('tenanan ta cok ?');

        $modelChoice = $this->choice('What should we do?', [
            'Overwrite existing model',
            'Use existing model',
            'Abort'
        ]);
        // $name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);
        // $userId = $this->argument('user');
        // $this->line($userId);


        // $options = $this->options();
        // $this->line($options);
        // Progress Bar
        // $users = Mahasiswa::all();

        // $bar = $this->output->createProgressBar(count($users));

        // foreach ($users as $user) {
        //     $this->performTask($user);

        //     $bar->advance();
        // }

        // $bar->finish();

        // return 0;
    }
}
