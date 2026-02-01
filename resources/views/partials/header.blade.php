<!-- Top part -->
<header class="w-full bg-white dark:bg-ash-900 border-b border-gray-100 dark:border-ash-800 transition-colors duration-300">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-6 py-2 text-sm text-gray-600 dark:text-gray-400">
      <a href="#" class="flex items-center gap-2 hover:text-gray-800">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-2.036a1.5 1.5 0 0 0-1.03-1.424l-3.351-1.117a1.5 1.5 0 0 0-1.548.36l-.86.86a12.035 12.035 0 0 1-5.303-5.303l.86-.86a1.5 1.5 0 0 0 .36-1.548L8.46 3.53A1.5 1.5 0 0 0 7.036 2.5H5a2.25 2.25 0 0 0-2.75 2.25v2z"/></svg>
        Contact us
      </a>
      <a href="#" class="flex items-center gap-2 hover:text-gray-800">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 7.5v9A2.25 2.25 0 0 1 19.5 18.75H4.5A2.25 2.25 0 0 1 2.25 16.5v-9A2.25 2.25 0 0 1 4.5 5.25h15A2.25 2.25 0 0 1 21.75 7.5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m3 7 8.438 6.329a1.5 1.5 0 0 0 1.812 0L21 7"/></svg>
        Email
      </a>
      <a href="#" class="flex items-center gap-2 hover:text-gray-800">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.056-7.5 10.5-7.5 10.5S4.5 17.556 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
        Our location
      </a>
    </div>
  </div>

  <!-- Main nav -->
  <div class="w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between py-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="shrink-0">
          <img src="{{ asset('images/logo1.png') }}" alt="Website Logo" class="h-10 md:h-12 w-auto">
        </a>

        <!-- Desktop links -->
        <ul class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-700 dark:text-gray-300">
          <li><a href="{{ route('home') }}" class="hover:text-black dark:hover:text-white transition-colors">Home</a></li>
          <li><a href="{{ route('artworks.index') }}" class="hover:text-black dark:hover:text-white transition-colors">Art Items</a></li>
          <li><a href="{{ route('about') }}" class="hover:text-black dark:hover:text-white transition-colors">About us</a></li>
          @auth

            @if(auth()->user()->isAdmin())
              <li><a href="{{ route('admin.dashboard') }}" class="text-indigo-600 font-bold hover:text-indigo-800 transition-colors">Admin</a></li>
            @endif
          @endauth
        </ul>

        <!-- Right controls -->
        <div class="flex items-center gap-4">
          <div class="relative hidden sm:block">
            <input type="text" placeholder="Search..." class="w-56 md:w-64 pl-9 pr-3 py-2 border border-gray-200 dark:border-ash-700 rounded-lg text-sm outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-ash-600 bg-white dark:bg-ash-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-ash-500 transition-colors">
            <svg class="absolute left-2 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400 dark:text-ash-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z"/>
            </svg>
          </div>

          <!-- Dark Mode Toggle -->
          <button type="button" 
                  x-data="{ 
                      darkMode: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) 
                  }"
                  @click="
                      darkMode = !darkMode;
                      if (darkMode) {
                          document.documentElement.classList.add('dark');
                          localStorage.theme = 'dark';
                      } else {
                          document.documentElement.classList.remove('dark');
                          localStorage.theme = 'light';
                      }
                  "
                  class="p-2 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition focus:outline-none">
                <!-- Sun Icon -->
                <svg x-show="!darkMode" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <!-- Moon Icon -->
                <svg x-show="darkMode" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
          </button>

          @if(!auth()->check() || auth()->user()->role !== 'admin')
          <a href="{{ route('cart.index') }}" class="p-2 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors" aria-label="Cart">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 3.75h2.386a1.5 1.5 0 0 1 1.447 1.095l.522 1.965m0 0L8.25 14.25h8.962a1.5 1.5 0 0 0 1.465-1.19l1.2-6A1.5 1.5 0 0 0 18.414 5.25H6.605m0 0L6 3.75M8.25 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm9 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/>
            </svg>
          </a>
          @endif

          @auth
            <div class="hidden md:flex items-center gap-3">
              <a href="{{ route('profile.show') }}" class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Hi, {{ auth()->user()->name }}</span>
              </a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors">Logout</button>
              </form>
            </div>
          @else
            <a href="{{ route('login') }}" class="hidden md:inline-flex p-2 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition-colors" aria-label="Login">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.1a7.5 7.5 0 0 1 15 0v.15c0 .412-.338.75-.75.75H5.25a.75.75 0 0 1-.75-.75v-.15Z"/>
              </svg>
            </a>
          @endauth

          <!-- Hamburger icon-->
          <button id="navToggle" class="inline-flex md:hidden items-center justify-center rounded p-2 text-gray-700 hover:bg-gray-100"
                  aria-label="Open menu" aria-expanded="false" aria-controls="mobileNav">
            <svg id="iconOpen" class="h-6 w-6 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg id="iconClose" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile drawer -->
      <div id="mobileNav" class="md:hidden hidden pb-4">
        <nav class="rounded-lg border bg-white dark:bg-ash-900 border-gray-200 dark:border-ash-700 p-3 text-sm font-medium text-gray-700 dark:text-gray-300 shadow-sm transition-colors">
          <a href="{{ route('home') }}" class="block rounded px-3 py-2 hover:bg-gray-50 dark:hover:bg-ash-800 transition-colors">Home</a>
          <a href="{{ route('artworks.index') }}" class="block rounded px-3 py-2 hover:bg-gray-50 dark:hover:bg-ash-800 transition-colors">Art Items</a>
          <a href="{{ route('about') }}" class="block rounded px-3 py-2 hover:bg-gray-50 dark:hover:bg-ash-800 transition-colors">About us</a>
          @if(!auth()->check() || auth()->user()->role !== 'admin')
          <a href="{{ route('cart.index') }}" class="mt-2 block rounded px-3 py-2 hover:bg-gray-50 dark:hover:bg-ash-800 transition-colors">Cart</a>
          @endif
          @auth
            <div class="mt-2 border-t border-gray-100 dark:border-ash-700 pt-2">
              <a href="{{ route('profile.show') }}" class="block px-3 py-2 text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-ash-800 transition-colors">
                Hi, {{ auth()->user()->name }}
              </a>

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left block rounded px-3 py-2 hover:bg-gray-50 dark:hover:bg-ash-800 text-gray-600 dark:text-gray-400 transition-colors">Logout</button>
              </form>
            </div>
          @else
            <a href="{{ route('login') }}" class="mt-2 block rounded px-3 py-2 hover:bg-gray-50 dark:hover:bg-ash-800 transition-colors">Login</a>
          @endauth
        </nav>
      </div>
    </div>
  </div>
</header>

<script>
(function () {
  const btn = document.getElementById('navToggle');
  const menu = document.getElementById('mobileNav');
  const iconOpen = document.getElementById('iconOpen');
  const iconClose = document.getElementById('iconClose');
  if (!btn || !menu) return;
  btn.addEventListener('click', () => {
    const isOpen = !menu.classList.contains('hidden');
    menu.classList.toggle('hidden', isOpen);
    btn.setAttribute('aria-expanded', String(!isOpen));
    iconOpen.classList.toggle('hidden', !isOpen);
    iconClose.classList.toggle('hidden', isOpen);
  });
})();
</script>
