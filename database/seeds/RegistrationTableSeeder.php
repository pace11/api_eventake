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
                'user_id' => 1,
                'event_id' => '8915266e193949568460c2074db2443f',
                'payment_id' => 1,
                'registration_datetime_in' => '2019-09-18 13:00:00',
                'registration_datetime_out' => '2019-09-18 16:00:00',
                'registration_status' => 'active',
            ],
            [
                'id' => Uuid::uuid4()->getHex(),
                'user_id' => 2,
                'event_id' => 'd39573e16abf4da693a1ca5757c4ac8b',
                'payment_id' => 3,
                'registration_datetime_in' => '2019-09-24 10:00:00',
                'registration_datetime_out' => '2019-09-24 13:00:00',
                'registration_status' => 'active',
            ],
        ]);
    }
}
