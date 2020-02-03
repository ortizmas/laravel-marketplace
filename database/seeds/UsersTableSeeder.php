<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use \App\Store;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*\DB::table('users')->insert(
            [
                'name' => 'Admin do Ssitema',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );*/

        factory(User::class, 40)->create()->each(function($user) {
            $user->store()->save(factory(Store::class)->make());
        });
    }
}
