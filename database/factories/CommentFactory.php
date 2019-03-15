<?php

use Faker\Generator as Faker;
use App\Models\{
    Comment, Article
};

$factory->define(Comment::class, function (Faker $faker) {
    $articles_ids = Article::select('id')->get();
    $article_id = $faker->randomElement($articles_ids)->id;
    return [
        'text' => $faker->text,
        'author' => $faker->name,
        'article_id' => $article_id,
    ];
});
