<?php

namespace Database\Seeders\Test;

use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * @var string[]
     */
    protected array $seeders = [];

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
    }
}
