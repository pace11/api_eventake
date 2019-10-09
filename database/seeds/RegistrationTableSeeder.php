<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;


class RegistrationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registration')->insert([
            [
                'id' => Uuid::uuid4()->getHex(),
                'users_id' => '2c3e1f8d231d4800b67862da0695cdf6',
                'event_id' => '1500ae41ff124f55a8317ef8c72602f2',
                'payment_id' => 1,
                'registration_datetime_in' => '2019-09-18 13:00:00',
                'registration_datetime_out' => '2019-09-18 16:00:00',
                'registration_status' => 'active',
            ],
            [
                'id' => Uuid::uuid4()->getHex(),
                'users_id' => '5f1afaa51f6545ca8e0525661810733a',
                'event_id' => '1500ae41ff124f55a8317ef8c72602f2',
                'payment_id' => 3,
                'registration_datetime_in' => '2019-09-24 10:00:00',
                'registration_datetime_out' => '2019-09-24 13:00:00',
                'registration_status' => 'active',
            ],
        ]);
    }
}
