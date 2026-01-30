<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function index()
    {
        return response()->json(Artwork::all());
    }

    public function show(Artwork $artwork)
    {
        return response()->json($artwork);
    }

    public function search(Request $request)
    {
        $term = $request->query('q');
        return response()->json(Artwork::search($term)->get());
    }
}
