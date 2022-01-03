@extends('main')

@section('content')
    <movie-card-component resource="{{ route('api.movies.index') }}"></movie-card-component>
@endsection
