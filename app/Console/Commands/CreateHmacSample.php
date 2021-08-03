<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateHmacSample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hmac:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create sample HMAC string for development';

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
     * @return int
     */
    public function handle()
    {
        if (!$authKey = config('system.authkey', null)) {
            $this->error("Authkey not set in env or system config.");
            return 0;
        }

        $name = $this->ask('Name');
        $email = $this->ask('Email');

        $hmac = hash_hmac('sha512', "{$name}|{$email}", $authKey);

        $this->info("HMAC STRING:");
        $this->line($hmac);
        $this->newLine();

        return 1;
    }
}
