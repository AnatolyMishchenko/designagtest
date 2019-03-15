<?php

use Illuminate\Database\Seeder;
use App\Models\Revision;

class RevisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Revision::create([
            'name' => 'Published'
        ]);
        Revision::create([
            'name' => 'Unpublished'
        ]);
    }
}
