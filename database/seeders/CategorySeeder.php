<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'title' => $faker->sentence(mt_rand(2, 5)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
