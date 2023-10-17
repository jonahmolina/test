@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="col-md-8">
            <a  class="btn btn-primary" href="/artists" role="button">List of Artists</a>
            <a  class="btn btn-primary" href="/albums" role="button">List of Albums</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header"><h2>Dashboard</h2></div>

                <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                            Display total number of albums sold per artist
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($artists as $artist)
                                    <tr>
                                        <td>{{ $artist->name }}</td>
                                        <td>{{ $artist->albums_count }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseOne">
                            Display combined album sales per artist
                          </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Total Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($artists as $artist)
                                    <tr>
                                        <td>{{ $artist->name }}</td>
                                        <td>{{ $artist->albums_sum_sales }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="true" aria-controls="flush-collapseOne">
                            Display the top 1 artist who sold most combined album sales
                          </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            @if ($topArtist)
                                <p><b>Name: </b>{{ $topArtist->name }}</p>
                                <p><b>Sales: </b>{{ $topArtist->albums_sum_sales }}</p>
                            @else
                                <p>No artists found</p>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Display list of albums based on the searched artist</h4>

                    
                    <form method="GET" action="{{ route('search') }}">
                        @csrf
                        <label for="artist_name">Artist Name:</label>
                        <input type="text" class="form-control" name="artist_name" id="artist_name">
                        <button type="submit" class="btn btn-primary mt-1">Search</button>
                    </form>
                    @if ($albums->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Album</th>
                                    <th>Artist</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($albums as $album)
                                    <tr>
                                        <td>{{ $album->name }}</td>
                                        <td>{{ $album->artist->name }}</td>
                                    </tr>
                                    @endforeach
                                
                                
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection
