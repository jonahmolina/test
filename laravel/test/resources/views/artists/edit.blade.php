@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Artist</h1>
        <a class="btn btn-secondary mb-1" href="/artists" role="button">Back</a>
        <form action="{{ route('artists.update', $artist->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $artist->name }}">
            </div>

            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ $artist->code }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection