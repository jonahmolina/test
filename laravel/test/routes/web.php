<?php

use App\Models\Artist;
use App\Models\Album;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Auth; 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function() {

    Route::resource('artists', ArtistController::class);
    Route::delete('/artists/{artist}', [ArtistController::class, 'destroy'])->name('artists.destroy');

    Route::resource('albums', AlbumController::class);

    Route::get('/home', 
        [ArtistController::class, 'index']
    )->name('home')->middleware('auth');

    Route::get('/search', 
        [ArtistController::class, 'search']
    )->name('search')->middleware('auth');

    Route::get('/artists', function () {
        $artists = Artist::with('albums')->simplePaginate(10);
        return view('artists.index', compact('artists'));
    })->name('artists.index')->middleware('auth');

    Route::get('/albums', function () {
        $albums = Album::with('artist')->simplePaginate(10);
        return view('albums.index', compact('albums'));
    })->name('albums.index')->middleware('auth');
  
});

Route::get('/import', function () {
    return view('import');
});

Route::post('/import-csv', [ImportController::class, 'importCSV'])->name('import.csv');


