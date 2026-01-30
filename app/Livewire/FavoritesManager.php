<?php

namespace App\Livewire;

use Livewire\Component;

class FavoritesManager extends Component
{
    public $artworkId;
    public $isFavorite = false;

    public function mount($artworkId)
    {
        $this->artworkId = $artworkId;
        $this->checkFavoriteStatus();
    }

    public function checkFavoriteStatus()
    {
        if (auth()->check()) {
            $this->isFavorite = \App\Models\Favorite::where('user_id', auth()->id())
                ->where('artwork_id', $this->artworkId)
                ->exists();
        }
    }

    public function toggleFavorite()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->details && auth()->user()->details->role === 'admin') {
             return; // Admin cannot favorite
        }


        if ($this->isFavorite) {
            \App\Models\Favorite::where('user_id', auth()->id())
                ->where('artwork_id', $this->artworkId)
                ->delete();
            $this->isFavorite = false;
        } else {
            \App\Models\Favorite::create([
                'user_id' => auth()->id(),
                'artwork_id' => $this->artworkId,
            ]);
            $this->isFavorite = true;
        }
    }

    public function render()
    {
        return view('livewire.favorites-manager');
    }
}
