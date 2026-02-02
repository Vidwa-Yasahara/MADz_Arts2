<?php

namespace App\Livewire;

use Livewire\Component;

class ArtworksList extends Component
{
    use \Livewire\WithPagination;

    public $search = '';
    public $category = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = \App\Models\Artwork::search($this->search);

        if (!empty($this->category)) {
            $query->where('category_id', $this->category);
        }

        $artworks = $query->paginate(6);
        $categories = \App\Models\Category::all();

        return view('livewire.artworks-list', [
            'artworks' => $artworks,
            'categories' => $categories
        ]);
    }
}
