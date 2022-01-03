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
         $this->call(ArtistTitleSeeder::class);
         $this->call(ArtistSeeder::class);
         $this->call(MovieSeeder::class);
    }
}
