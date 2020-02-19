<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Seed Users with Wallet
        $users = factory(App\User::class, 3)
        			->create()
        			->each(function($user) {
        				$user->wallet()->save(factory(App\Wallet::class)->make());
        			});

        // $plans = factory(App\Plan::class, 5)->create();
    }
}
