@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-secondary mb-1" href="/home" role="button">Back</a>
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
                                  <button type="button" name="" id="" class="btn btn-primary btn-sm">Edit</button>
                                  <button type="button" name="" id="" class="btn btn-primary btn-sm">Delete</button>
                                </td>
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
