
<?php

class LoginTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'ali',
        'email'    => 'ali@gmail.com',
        'password' => Hash::make('awesome'),
    ));
}

}