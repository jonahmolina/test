<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Album;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::withCount('albums')->withSum('albums', 'sales')->get();
        $topArtist = Artist::withSum('albums', 'sales')->orderByDesc('albums_sum_sales')->first();
        $albums = collect(); // Initialize an empty collection

        return view('home', compact('artists', 'topArtist', 'albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist = Artist::findOrFail($id);

        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artist = Artist::findOrFail($id);

        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artist = Artist::findOrFail($id);

        $artist->update($request->all());

        return redirect()->route('artists.show', $artist->id)->with('success', 'Artist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist = Artist::findOrFail($id);

        $artist->delete();

        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');
    }

    public function search(Request $request)
    {
        $artistName = $request->input('artist_name');
        
        $albums = Album::whereHas('artist', function ($query) use ($artistName) {
            $query->where('name', 'LIKE', '%'.$artistName.'%');
        })->get();

        $artists = Artist::withCount('albums')->withSum('albums', 'sales')->get();
        $topArtist = Artist::withSum('albums', 'sales')->orderByDesc('albums_sum_sales')->first();

        return view('home', compact('albums', 'artists', 'topArtist'));
    }

}
