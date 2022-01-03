<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Movie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//

Route::redirect('/', '/movies');

Route::resource('movies', 'MovieController');

Route::get('rating_scope', function () {
    return Movie::rating(6)->get();
});

Route::get('status_scope', function () {
    return Movie::status(0)->get();
});

Route::get('artist_scope', function () {
    return Movie::artist('Director')->get();
});

