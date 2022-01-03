<?php

use Illuminate\Database\Seeder;
use App\ArtistTitle as ArtistTitle;

class ArtistTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArtistTitle::create(['title' => 'Star']);
        ArtistTitle::create(['title' => 'Writeer']);
        ArtistTitle::create(['title' => 'Director']);
    }
}
