<?php

namespace Database\Seeders;
use App\Models\Courses;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 200; $i++) {
            courses::create([
                'name' => $faker->name,
                'ended_at' => $faker->date(),
                'started_at' => $faker->date(),
                'price' => $faker->randomDigit(),
                'description' => $faker->text(),
//                'category' => $faker->category
            ]);
        }
    }
}
