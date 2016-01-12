<?php

use App\Blog\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostCategory::class)->create(['name' => 'Articles']);
        factory(PostCategory::class)->create(['name' => 'Recipes']);
    }
}
