@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-secondary mb-1" href="/home" role="button">Back</a>
            @if (session('success'))
                <div class="alert alert-success"> {{ session('success') }} </div> 
            @endif
            <div class="card">
                <div class="card-header">
                    <h1>Albums</h1>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Artist</th>
                                <th>Name</th>
                                <th>Sales</th>
                                <th>Year</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums as $album)
                            <tr>
                                <td>{{ $album->artist->name }}</td>
                                <td>{{ $album->name }}</td>
                                <td>{{ $album->sales }}</td>
                                <td>{{ $album->album_year }}</td>
                                <td>
                                    <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                {{-- <td>
                                  <button type="button" name="" id="" class="btn btn-primary btn-sm">Edit</button>
                                  <button type="button" name="" id="" class="btn btn-primary btn-sm">Delete</button>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $albums->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
