<?php

use CodeDelivery\Models\User;
use Illuminate\Database\Seeder;
use CodeDelivery\Models\Client;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        factory(User::class)->create([
            'name' => 'Amdin',
            'email' => 'admin@user.com',
            'password' => bcrypt(123456),
            'role'  =>  'amdin',
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 10)->create()->each(function($client) {

            $client->client()->save(factory(Client::class)->make());

        });
    }
}
