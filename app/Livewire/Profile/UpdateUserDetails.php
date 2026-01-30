<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class UpdateUserDetails extends Component
{
    public $phone;
    public $address;
    public $city;
    public $country;
    public $postal_code;
    public $isEditing = false;

    public function mount()
    {
        $details = auth()->user()->details;
        
        if ($details) {
            $this->phone = $details->phone;
            $this->address = $details->address;
            $this->city = $details->city;
            $this->country = $details->country;
            $this->postal_code = $details->postal_code;
        }
    }

    public function toggleEdit()
    {
        $this->isEditing = !$this->isEditing;
    }

    public function updateUserDetails()
    {
        $this->validate([
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:255'],
        ]);

        $user = auth()->user();

        if ($user->details) {
            $user->details->update([
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'country' => $this->country,
                'postal_code' => $this->postal_code,
            ]);
        } else {
            $user->details()->create([
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'country' => $this->country,
                'postal_code' => $this->postal_code,
            ]);
        }

        $this->isEditing = false;
        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.profile.update-user-details');
    }
}
