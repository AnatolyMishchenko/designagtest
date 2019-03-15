<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(RevisionsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ArtilesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
