<?php

use Illuminate\Database\Seeder;
use App\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Artist::class, 15)->create();
    }
}
