<?php

use App\Post;
use App\Video;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PolymorphicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 5 ; $i++) { 
            Video::create([
                'title' => $faker->word,
                'url'   => $faker->url
            ]);

            Post::create([
                'title' => $faker->word,
                'body'   => $faker->text
            ]);
        }
    }
}
