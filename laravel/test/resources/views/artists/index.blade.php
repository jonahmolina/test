@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-secondary mb-1" href="/home" role="button">Back</a>
            <div class="card">
                <div class="card-header">
                    <h1>Artists</h1>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artists as $artist)
                            <tr>
                                <td>{{ $artist->name }}</td>
                                <td>{{ $artist->code }}</td>
                                <td>
                                    <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" style="display: inline-block">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
