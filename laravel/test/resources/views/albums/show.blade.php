@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success"> {{ session('success') }} </div> 
        @endif
        <h1>Album Details</h1>
        <a class="btn btn-secondary mb-1" href="/albums" role="button">Back</a>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Name : </b>{{ $album->name }}</h5>
                <h5 class="card-title"><b>Artist : </b>{{ $artist->name }}</h5>
                <h5 class="card-title"><b>Sales : </b>{{ $album->sales }}</h5>
                <h5 class="card-title"><b>Year : </b>{{ $album->album_year }}</h5>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection