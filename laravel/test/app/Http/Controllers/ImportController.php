<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Album;
use Faker\Factory;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function importCSV(Request $request)
{
    $path = $request->file('csv_file')->getRealPath();

    $data = array_map('str_getcsv', file($path));
    $header = array_shift($data);

    $faker = Factory::create();

    $artists = []; // Array to store artist names and their corresponding IDs

    foreach ($data as $row) {
        $artistName = $row[0];
        $albumName = $row[1];
        $sales = $row[2];
        $dateReleased = $row[3];
        $lastUpdate = $row[4];

        // Check if artist already exists in the $artists array
        if (isset($artists[$artistName])) {
            $artistId = $artists[$artistName];
        } else {
            // Artist does not exist, create a new one
            $artist = Artist::create([
                'name' => $artistName,
                'code' => $faker->unique()->randomNumber(4),
            ]);

            $artistId = $artist->id;
            $artists[$artistName] = $artistId; // Store artist name and ID in the $artists array
        }

        $album = new Album();
        $album->artist_id = $artistId;
        $album->name = $albumName;
        $album->sales = $sales;
        $album->album_year = date('Y', strtotime($dateReleased));
        $album->created_at	 = $dateReleased;
        $album->updated_at = $lastUpdate;
        $album->save();
    }

    // Optionally, you can return a response or redirect to a specific route
}
}
