<?php

namespace App\Console\Commands\Onboarding;

use Illuminate\Console\Command;
use App\Models\UserInvite;
use App\Mail\OnboardingMail;
use Illuminate\Support\Facades\Mail;

class SendInviteEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onboarding:send-invite-emails {id} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the invite email';

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
        $invite_id = $this->argument('id');
        $force_send = $this->option('force');
        $invite = UserInvite::where('id', $invite_id)->first();
        if($invite) {
            // send email
            if(!$invite->invite_sent || $force_send) {
                Mail::to($invite->email)->send(new OnboardingMail($invite->name, $invite->code));
                $invite->update([
                    'invite_sent' => 1,
                ]);
                $this->info('Invite Sent');
            } else {
                $this->info('Invite Already Sent');
                // dump('Invite Already Sent');
            }
        } else {
            $this->info('No Invite With That ID Found');
        }
    }
}
