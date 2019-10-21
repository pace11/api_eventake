<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            [
                'first_name' => 'Muhammad Iriansyah',
                'last_name' => 'Putra Pratama',
                'date_of_birth' => '1996-06-05',
                'email' => 'ryanjoker87@gmail.com',
                'password' => Hash::make('RyanPace1996'),
                'address' => 'Jln. Enggros Kampkey Abepura',
                'gender' => 'Male',
                'phone' => '82248080870',
            ],
            [
                'first_name' => 'Sri Fajar',
                'last_name' => 'Riantri Alvani',
                'date_of_birth' => '1997-01-27',
                'email' => 'riantri271@gmail.com',
                'password' => Hash::make('Sri1997'),
                'address' => 'Jln. Raya Sentani YPKP',
                'gender' => 'Female',
                'phone' => '81354141927',
            ],
        ]);
    }
}
