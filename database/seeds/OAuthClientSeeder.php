<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'id' => 'appid01',
            'secret' => 'secret',
            'name' => 'Minha App Mobile',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
