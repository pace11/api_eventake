<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'categories_name' => 'Festival Electronic Dance Music',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'categories_name' => 'Conference',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'categories_name' => 'Exhibition',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'categories_name' => 'Sports',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'categories_name' => 'Workshop',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
