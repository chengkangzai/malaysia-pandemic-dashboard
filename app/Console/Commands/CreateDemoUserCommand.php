<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateDemoUserCommand extends Command
{
    protected $signature = 'create:demo-user {email=demo@chengkangzai.com} {password=password}';

    protected $description = 'This command will create a user';

    public function handle(): void
    {
        $email = $this->option('email');
        $password = $this->option('password');

        if (User::firstWhere('email', $email)) {
            $this->error('User already exists');
            return;
        }

        $this->info('Creating user...');
        $user = User::create([
            'name' => 'Demo User',
            'email' => $email,
            'password' => bcrypt($password),
        ]);
        $this->info('User created successfully! Enjoy!');

    }
}
