<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');



        for ($i = 0; $i < 20; $i++) {
            //$title = Str::random(20);
            $title = Str()->random(20);
            $c = Category::inRandomOrder()->first();
            Post::create(
                [
                    'title' => $title,
                    'slug' => Str($title)->slug(),
                    //'slug' => Str::slug($title),
                    'content' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias quod, doloremque quia quo quis laudantium dolorum vel voluptatem sit quisquam nam adipisci a fugiat deserunt cumque at? Maiores, dolores explicabo.</p>',
                    'description' => 'met consectetur adipisicing elit. Alias quod, doloremque quia quo quis laudantium dolorum vel voluptatem sit quisquam nam adipisci a fugiat deserunt cumque at? Maiores',
                    'posted' => 'yes',
                    'category_id' => $c->id
                ]

            );
        }
    }
}
