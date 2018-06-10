<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();
  //	Añadimos	una	entrada	a	esta	tabla
      User::create(array('email'	=>	'foo@bar.com'));
    }
}
