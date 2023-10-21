<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();

        return view('albums.index', compact('albums'));
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
        $data = $request->validate([
            'artist_id' => 'required|exists:artists,id',
            'year' => 'required|integer',
            'name' => 'required|string',
            'sales' => 'required|integer',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $data['cover_image'] = $request->file('cover_image')->store('album_covers', 'public');
    
        $album = Album::create($data);
    
        return redirect()->route('albums.show', $album->id)->with('success', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = Album::findOrFail($id);
        $artist = Artist::findOrFail($album->artist_id);

        return view('albums.show', compact('album','artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::findOrFail($id);
        $artists = Artist::all();

        return view('albums.edit', compact('album','artists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $album = Album::findOrFail($id);

        $album->update($request->all());

        return redirect()->route('albums.show', $album->id)->with('success', 'Album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::findOrFail($id);

        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Album deleted successfully.');
    }
}
