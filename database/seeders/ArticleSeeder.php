<?php

namespace Database\Seeders;

use App\Models\Article\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Article::factory()->create();
    }
}
