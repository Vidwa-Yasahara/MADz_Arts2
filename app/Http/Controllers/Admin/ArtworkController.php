<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::latest()->paginate(10);
        return view('admin.artworks.index', compact('artworks'));
    }

    public function create()
    {
        return view('admin.artworks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'size' => 'required|string|max:100',
            'year' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Artwork::create($validated);

        return redirect()->route('admin.artworks.index')->with('success', 'Artwork created successfully.');
    }

    public function edit(Artwork $artwork)
    {
        return view('admin.artworks.edit', compact('artwork'));
    }

    public function update(Request $request, Artwork $artwork)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'size' => 'required|string|max:100',
            'year' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if not a seeded one
            if (file_exists(public_path('images/' . $artwork->image)) && !str_starts_with($artwork->image, 'art')) {
                unlink(public_path('images/' . $artwork->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        } else {
            unset($validated['image']);
        }

        $artwork->update($validated);

        return redirect()->route('admin.artworks.index')->with('success', 'Artwork updated successfully.');
    }

    public function destroy(Artwork $artwork)
    {
        if (file_exists(public_path('images/' . $artwork->image)) && !str_starts_with($artwork->image, 'art')) {
            unlink(public_path('images/' . $artwork->image));
        }
        $artwork->delete();
        return redirect()->route('admin.artworks.index')->with('success', 'Artwork deleted successfully.');
    }
}
