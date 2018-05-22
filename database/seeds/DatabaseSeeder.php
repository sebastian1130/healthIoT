<?php

use Illuminate\Database\Seeder;
use App\User;
use App\sistema;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::unguard();
        $this->call(UsersTableSeeder::class);
        User::reguard();
        sistema::unguard();
        $this->call(sistemasTableSeeder::class);
        sistema::reguard();



    }
}
