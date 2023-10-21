@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Album</h1>
        <a class="btn btn-secondary mb-1" href="/albums" role="button">Back</a>
        <form action="{{ route('albums.update', $album->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $album->name }}">
            </div>

            <div class="form-group">
                    <label for="artist" class="form-label">Artists:</label>
                    <select class="form-select" name="artist_id" id="artist_id">
                            <option selected>Select one</option>
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}" {{ $album->artist_id === $artist->id ? 'Selected' : '' }}>{{ $artist->name }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="form-group">
                <label for="name">Sales:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $album->sales }}">
            </div>

            <div class="form-group">
                <label for="name">Year:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $album->album_year }}">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
@endsection