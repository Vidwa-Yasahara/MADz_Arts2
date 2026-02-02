<?php

namespace App\Livewire\Profile;

use Livewire\Component;

use Livewire\WithFileUploads;

class UpdateUserDetails extends Component
{
    use WithFileUploads;

    public $photo;
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

    public function openEdit()
    {
        $this->isEditing = true;
    }

    public function closeEdit()
    {
        $this->isEditing = false;
        $this->photo = null; // Clear photo selection on cancel
    }

    public function toggleEdit()
    {
        $this->isEditing = !$this->isEditing;
    }

    public function updateUserDetails()
    {
        $this->validate([
            'photo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:2048'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:255'],
        ], [
            'photo.image' => 'The file must be an image.',
            'photo.mimes' => 'Only JPEG, PNG, GIF, and WebP images are allowed.',
            'photo.max' => 'The image must not be larger than 2MB.',
        ]);

        $user = auth()->user();

        // Handle profile photo upload
        if ($this->photo) {
            try {
                $user->updateProfilePhoto($this->photo);
                \Log::info('Profile photo updated', ['path' => $user->fresh()->profile_photo_path]);
            } catch (\Exception $e) {
                \Log::error('Profile photo update failed', ['error' => $e->getMessage()]);
                session()->flash('error', 'Failed to update profile photo: ' . $e->getMessage());
            }
        }

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

        // Refresh the user model to get updated photo path
        auth()->user()->refresh();
        
        $this->isEditing = false;
        
        // Show success message
        session()->flash('message', 'Your details have been updated successfully!');
        
        // Dispatch event to refresh any listening components
        $this->dispatch('profile-updated');
    }

    public function render()
    {
        return view('livewire.profile.update-user-details');
    }
}
