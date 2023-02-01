<?php

namespace Database\Seeders;

use Database\Seeders\Test\TestDatabaseSeeder;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * @var string[]
     */
    protected array $seeders = [
        ArticleSeeder::class,
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        collect($this->seeders)->each(function ($seeder) {
            $this->call($seeder);
        });

        if (env('APP_ENV') === 'testing') {
            $this->call(TestDatabaseSeeder::class);
        }
    }
}
