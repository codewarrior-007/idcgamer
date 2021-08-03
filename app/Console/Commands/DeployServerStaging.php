<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DeployServerStaging extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy:staging';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deploy to the Forge Staging server';

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
        if ($this->confirm('Are you sure you want to deploy to the staging server?')) {

            $nodes = [
                'Forge-Staging' => 'https://forge.laravel.com/servers/471035/sites/1356774/deploy/http?token=9eg81mMeJBSah1IcR89G9KoqHerVxgxJXllH57ET',
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
