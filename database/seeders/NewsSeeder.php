<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'category_id' => $faker->numberBetween(1, 5),
                'source_id' => $faker->numberBetween(1, 10),
                'title' => $faker->sentence(mt_rand(1, 2)),
                'image' => $faker->imageUrl(640, 480),
                'description' => $faker->text(250),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
