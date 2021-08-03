<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DeployServerDev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deploy to the Forge Dev server';

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
        if ($this->confirm('Are you sure you want to deploy to the development server?')) {

            $nodes = [
                'Forge-Dev' => 'https://forge.laravel.com/servers/471036/sites/1356776/deploy/http?token=g5h8fsYZ9ODQxU4LTaSbJxwhPc6SvbJCrAbKokd0',
            ];

            foreach ($nodes as $key => $url) {

                $response = Http::get($url);

                if ($response->ok()) {
                    $this->info("{$key} deploy request sent successfully.");    
                } else {
                    $this->error("There was an issue sending the {$key} deploy request.");
                    $response->throw();
                }
            }
        }
    }
}
