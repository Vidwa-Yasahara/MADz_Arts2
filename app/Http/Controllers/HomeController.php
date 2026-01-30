<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredArtworks = \App\Models\Artwork::inRandomOrder()->limit(3)->get();
        return view('home', compact('featuredArtworks'));
    }
}

