<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserStatusHistory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->password = Hash::make(Str::random(60));
        $user->email = 'test@example.com';
        $user->name = 'Test User';
        $user->status = UserStatusHistory::STATUS_REGISTER;
        $user->type = UserStatusHistory::USER_TYPE_DEFAULT;
        $user->save();

        $status = new UserStatusHistory;
        $status->user_id = $user->id;
        $status->status = UserStatusHistory::STATUS_REGISTER;
        $status->save();
    }
}
