<?php

use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment')->insert([
            [
                'payment_name' => 'BCA',
                'payment_desc' => 'Lorem Ipsum',
            ],
            [
                'payment_name' => 'Mandiri',
                'payment_desc' => 'Lorem Ipsum',
            ],
            [
                'payment_name' => 'Jenius',
                'payment_desc' => 'Lorem Ipsum',
            ],
        ]);
    }
}
