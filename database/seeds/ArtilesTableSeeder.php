<?php

use Illuminate\Database\Seeder;

class ArtilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Article::class, 30)->create();
        $tags = \App\Models\Tag::all();
        \App\Models\Article::all()->each(function ($article) use ($tags) {
            $article->tags()->attach(
                $tags->random(rand(1,5))->pluck('id')->toArray()
            );
        });
    }
}
