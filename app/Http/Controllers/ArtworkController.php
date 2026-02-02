<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Artwork;

class ArtworkController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('artworks.index', compact('categories'));
    }

    public function show(Artwork $artwork)
    {
        return view('artworks.show', compact('artwork'));
    }
}

