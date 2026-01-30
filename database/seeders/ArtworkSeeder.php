<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Artwork::create([
            'title' => 'Dracula Rising',
            'artist' => 'Abu',
            'price' => 2000.00,
            'size' => '36" x 48"',
            'year' => 2024,
            'image' => 'art1.jpg',
            'description' => 'A haunting gothic painting featuring a castle silhouette under a blood moon.',
            'stock' => 10,
        ]);

        \App\Models\Artwork::create([
            'title' => 'Forest Whispers',
            'artist' => 'Marcus Chen',
            'price' => 850.00,
            'size' => '20" x 30"',
            'year' => 2023,
            'image' => 'art2.jpg',
            'description' => 'A calming forest scene capturing the beauty and mystery of nature.',
            'stock' => 10,
        ]);

        \App\Models\Artwork::create([
            'title' => 'Melting Moon',
            'artist' => 'Suthan the GOAT',
            'price' => 1850.00,
            'size' => '22" x 28"',
            'year' => 2023,
            'image' => 'art3.jpg',
            'description' => 'A surreal painting of a crescent moon melting into the landscape.',
            'stock' => 10,
        ]);

        \App\Models\Artwork::create([
            'title' => 'Abstract Chaos',
            'artist' => 'Sophia Narrett',
            'price' => 1650.00,
            'size' => '28" x 28"',
            'year' => 2023,
            'image' => 'art4.jpg',
            'description' => 'Abstract strokes and layers of colors forming chaotic yet beautiful expressions.',
            'stock' => 10,
        ]);

        \App\Models\Artwork::create([
            'title' => 'Graffiti Abstract',
            'artist' => 'Street Collective',
            'price' => 1500.00,
            'size' => '40" x 30"',
            'year' => 2022,
            'image' => 'art5.jpg',
            'description' => 'A vibrant graffiti-inspired artwork full of bold colors and urban energy.',
            'stock' => 10,
        ]);
    }
}
