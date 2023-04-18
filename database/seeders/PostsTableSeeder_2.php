<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder_2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $now = Carbon::now()->toDateTimeString();

        // Генератор случайных слов и предложений lorem ipsum
        $faker = \Faker\Factory::create('ru_RU');

        // Фильтр для выбора случайного статуса
        $statuses = ['published', 'draft'];

        // Генерируем 10000 случайных записей
        for ($i = 1; $i <= 1000; $i++) {
            $post = [
                'author_id' => rand(1, 10000),
                'category_id' => rand(1, 1000),
                'title' => $faker->sentence,
                'seo_title' => $faker->sentence,
                'excerpt' => $faker->paragraph(1),
                'body' => $faker->paragraphs(rand(3, 10), true),
                'image' => 'image' . rand(1, 10) . '.jpg',
                'slug' => $faker->unique()->slug(),
                'meta_description' => $faker->sentence,
                'meta_keywords' => $faker->sentence,
                'status' => $statuses[array_rand($statuses)],
                'created_at' => $now,
                'updated_at' => $now,
            ];

            // Используем батч-вставки для ускорения процесса
            if ($i % 1000 == 0) {
                DB::table('posts')->insert($post);
            } else {
                DB::table('posts')->insert($post);
            }
        }
    }
}
