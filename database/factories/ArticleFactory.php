<?php

use Faker\Generator as Faker;
use App\Models\{
    Article, Revision, Category
};

$factory->define(Article::class, function (Faker $faker) {
    $revisions_ids = Revision::select('id')->get();
    $revision_id = $faker->randomElement($revisions_ids)->id;
    $categories_ids = Category::select('id')->get();
    $category_id = $faker->randomElement($categories_ids)->id;
    return [
        'title' => $faker->title,
        'text' => $faker->text,
        'category_id' => $category_id,
        'revision_id' => $revision_id,
    ];
});
