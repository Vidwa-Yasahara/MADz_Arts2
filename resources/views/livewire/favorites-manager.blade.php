<div class="inline-block">
    @if(auth()->check() && auth()->user()->details && auth()->user()->details->role === 'admin')
        <!-- Admin sees nothing or disabled button -->
    @else
        <button wire:click="toggleFavorite" 
                class="group p-4 rounded-full transition-all duration-300 {{ $isFavorite ? 'bg-red-50 text-red-500' : 'bg-ash-100 text-gray-400 hover:bg-red-50 hover:text-red-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform transition-transform duration-300 {{ $isFavorite ? 'scale-110 fill-current' : 'group-hover:scale-110' }}" fill="{{ $isFavorite ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </button>
    @endif
</div>
