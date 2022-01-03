<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Movie::class, 20)->create();

        foreach (Movie::all() as $movie) {
            $stars = \App\Artist::inRandomOrder()->take(rand(1, 5))->pluck('id');
            $movie->artists()->attach($stars);
        }

    }
}
