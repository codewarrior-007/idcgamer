<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gamer:generate-key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate encryption key for env';

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
        $this->info("Generating encryption key...");
        exec('vendor/bin/generate-defuse-key', $output);

        if (is_array($output)) {
            $this->line("GAMER_INTERNAL_SECURE_KEY=".$output[0]);
        }

        return 0;
    }
}
