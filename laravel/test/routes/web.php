<?php

use App\Models\Artist;
use App\Models\Album;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ImportController;


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

Route::resource('artists', ArtistController::class);
Route::delete('/artists/{artist}', [ArtistController::class, 'destroy'])->name('artists.destroy');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 
    [ArtistController::class, 'index']
)->name('home');

Route::get('/search', 
    [ArtistController::class, 'search']
)->name('search');

Route::get('/import', function () {
    return view('import');
});

Route::post('/import-csv', [ImportController::class, 'importCSV'])->name('import.csv');

Route::get('/artists', function () {
    $artists = Artist::with('albums')->get();
    return view('artists.index', compact('artists'));
});

Route::get('/albums', function () {
    $albums = Album::with('artist')->get();
    return view('albums', compact('albums'));
});





