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
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(PaymentTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(EventTableSeeder::class);
        $this->call(RegistrationTableSeeder::class);
    }
}
