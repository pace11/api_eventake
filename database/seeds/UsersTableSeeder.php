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
        DB::table('users')->insert([
            [
                'id' => Uuid::uuid4()->getHex(),
                'first_name' => 'Muhammad Iriansyah',
                'last_name' => 'Putra Pratama',
                'date_of_birth' => '1996-06-05',
                'email' => 'ryanjoker87@gmail.com',
                'password' => password_hash('RyanPace1996', PASSWORD_DEFAULT),
                'address' => 'Jln. Enggros Kampkey Abepura',
                'gender' => 'Male',
                'phone' => '82248080870',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4()->getHex(),
                'first_name' => 'Sri Fajar',
                'last_name' => 'Riantri Alvani',
                'date_of_birth' => '1997-01-27',
                'email' => 'riantri271@gmail.com',
                'password' => password_hash('Sri1997', PASSWORD_DEFAULT),
                'address' => 'Jln. Raya Sentani YPKP',
                'gender' => 'Female',
                'phone' => '81354141927',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
