<?php

use Illuminate\Database\Seeder;
use App\User;

class TestUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'そうしのまくら',
            'email' => 'a@example.com',
            'password' => Hash::make('test1234'),
        ]);

        User::create([
            'name' => 'たきじい',
            'email' => 'b@example.com',
            'password' => Hash::make('test1234'),
        ]);

        User::create([
            'name' => 'あくたの龍ちゃん',
            'email' => 'c@example.com',
            'password' => Hash::make('test1234'),
        ]);
    }
}
