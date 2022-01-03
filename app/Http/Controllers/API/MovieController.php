<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Resources\MovieResource;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with('artists')
            ->where('status', 1)
            ->where('rating', '>', '5')
            ->paginate('5');

        return MovieResource::collection($movies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MovieRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MovieRequest $request)
    {
        $movie = new Movie();
        $movie->status = $request->status;
        $movie->name = $request->name;
        $movie->rating = $request->rating;
        $movie->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = $movie->name . "_" . time().'.'.$request->image->extension();
            $request->image->move(public_path('img/movies'), $imageName);
            $movie->image = 'img/movies/' . $imageName;
        } else {
            $movie->image = 'img/movies/dummy.png';
        }

        if ($movie->save()) {
            $movie->artists()->attach($request->artists);
            return response()->json([
                'success' => true,
                'message' => 'Movie added!',
                'data' => $movie
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        if ($movie->delete()) {
            return new MovieResource($movie);
        }
    }
}
