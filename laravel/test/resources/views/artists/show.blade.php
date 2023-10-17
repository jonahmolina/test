@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Artist Details</h1>
        <a class="btn btn-secondary mb-1" href="/artists" role="button">Back</a>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Name : </b>{{ $artist->name }}</h5>
                <p class="card-text"><strong>Code :</strong> {{ $artist->code }}</p>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection