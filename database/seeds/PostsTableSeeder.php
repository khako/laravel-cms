<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the posts table
        DB::table('posts')->truncate();

        // generate 10 dummy posts data
        $posts = [];
        $faker = Factory::create();
        for ($i=1; $i <= 10; $i++)
        {
            $date = date("Y-m-d H:i:s", strtotime("2016-07-18 08:00:00 +{$i} days"));
            $posts[] = [
                'author_id' => rand(1, 3), // rand between 1 and 3 caus I create 3 dummy user/author
                'title' => $faker->sentence(rand(8, 12)),
                'excerpt' => $faker->text(rand(250, 300)),
                'body' => $faker->paragraphs(rand(10, 15), true),
                'slug' => $faker->slug(),
                'image' => rand(0, 1) === 1 ? $faker->imageUrl : NULL,
                'created_at' => $date,
                'updated_at' => $date
            ];
        }

        DB::table('posts')->insert($posts);
    }
}