<?php

namespace App\Containers\AppSection\User\UI\CLI\Commands;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\AppSection\User\UI\API\Requests\CreateAdminRequest;
use App\Ship\Parents\Commands\ConsoleCommand;

class CreateAdminCommand extends ConsoleCommand
{
    protected $signature = 'apiato:create:admin';

    protected $description = 'Create a new User with the ADMIN role';

    public function handle(): void
    {
        $username = $this->ask('Enter the username for this user');
        $email = $this->ask('Enter the email address of this user');
        $password = $this->secret('Enter the password for this user');
        $password_confirmation = $this->secret('Please confirm the password');

        if ($password !== $password_confirmation) {
            $this->error('Passwords do not match - exiting!');
            return;
        }

        $request = new CreateAdminRequest([
            'name' => $username,
            'email' => $email,
            'password' => $password,
        ]);

        Apiato::call('User@CreateAdminAction', [$request]);

        $this->info('Admin ' . $email . ' was successfully created');
    }
}