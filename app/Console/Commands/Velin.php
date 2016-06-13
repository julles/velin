<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Velin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'velin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installing Velin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Prepare Install");
        $this->info("Installing");
        \Artisan::call('migrate');
        \Artisan::call('db:seed');
        $this->info("Selesai");
    }
}
