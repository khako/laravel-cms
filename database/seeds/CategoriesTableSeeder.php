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
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'title' => 'Hip hop',
                'slug' => 'hip-hop',
            ],
            [
                'title' => 'Trap Music',
                'slug' => 'trap-music',
            ],
            [
                'title' => 'Cloud Rap',
                'slug' => 'cloud-rap',
            ],
            [
                'title' => 'House music',
                'slug' => 'house-music',
            ],
            [
                'title' => 'Dub techno',
                'slug' => 'dub-techno',
            ],
        ]);

        // update posts data
        for ($post_id = 1; $post_id <= 10; $post_id++)
        {
            $category_id = rand(1, 5);

            DB::table('posts')
                ->where('id', $post_id)
                ->update(['category_id' => $category_id]);
        }
    }
}
