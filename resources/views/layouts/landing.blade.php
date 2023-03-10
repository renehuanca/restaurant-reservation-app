<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{isDark: true}" x-bind:class="isDark ? 'dark' : 'light'" x-init="
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add('dark')
  isDark = true
} else {
  document.documentElement.classList.remove('dark')
  isDark = false
}
" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Restaurant Reservations - {{ $title }}</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
  <div class="isolate bg-white dark:bg-gray-900 text-gray-600 dark:text-gray-300 bg-dots-dark">
    <!-- Bg Gradient -->
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
      <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
        <defs>
          <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
            <stop stop-color="#9089FC"></stop>
            <stop offset="1" stop-color="#FF80B5"></stop>
          </linearGradient>
        </defs>
      </svg>
    </div>

    <!-- Menu -->
    <div class="px-6 py-6 lg:px-8">
      <div x-data="{open: false}">
        <!-- Desktop menu -->
        <nav class="flex h-9 items-center justify-between" aria-label="Global">
          <div class="flex lg:min-w-0 lg:flex-1" aria-label="Global">
            <a href="{{ route('welcome') }}" class="-m-1.5 p-1.5">
              <span class="sr-only">Reservation app</span>
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
          </div>
          <div class="flex lg:hidden">
			  <!-- theme switcher -->
			  <div class="inline-block flex items-center text-gray-600 dark:text-gray-300 mr-4" @click="isDark = !isDark; if(isDark) {localStorage.theme = 'dark'} else {localStorage.theme = 'light'}">
				<svg x-show="!isDark" x-transition xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				  <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
				</svg>
				<svg x-show="isDark" x-transition xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				  <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
				</svg>
			  </div>

            <button @click="open = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 dark:text-gray-300">
              <span class="sr-only">Open main menu</span>
              <!-- Heroicon name: outline/bars-3 -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>
          </div>
          <div class="hidden lg:flex lg:min-w-0 lg:flex-1 lg:justify-center lg:gap-x-12">
            <a href="{{ route('welcome') }}" class="font-semibold text-gray-900 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">Home</a>
            <a href="#ourMenu" class="font-semibold text-gray-900 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">Menu</a>
          </div>

          <div class="hidden lg:flex lg:min-w-0 lg:flex-1 lg:justify-end">
						
        	  <!-- theme switcher -->
            <div class="flex items-center text-gray-600 dark:text-gray-300 mr-2" @click="isDark = !isDark; if(isDark) {localStorage.theme = 'dark'} else {localStorage.theme = 'light'}">
              <svg x-show="!isDark" x-transition xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
              </svg>
              <svg x-show="isDark" x-transition xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
              </svg>
            </div>

            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="inline-block rounded-lg px-3 py-1.5 text-sm font-semibold leading-6 text-gray-900 dark:text-gray-300 shadow-sm ring-1 ring-gray-900/10 dark:ring-gray-300 hover:ring-gray-900/20 dark:hover:text-gray-100">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="inline-block rounded-lg px-3 py-1.5 text-sm dark:text-gray-300 font-semibold leading-6 text-gray-900 shadow-sm ring-1 ring-gray-900/10 dark:ring-gray-300 hover:ring-gray-900/20dark:hover:text-gray-100">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-2 inline-block rounded-lg px-3 py-1.5 text-sm font-semibold  dark:text-gray-300 leading-6 text-gray-900 shadow-sm ring-1 ring-gray-900/10 dark:ring-gray-300 hover:ring-gray-900/20 mx-2dark:hover:text-gray-100">Register</a>
            @endif
            @endauth
            @endif
          </div>
        </nav>
        <!-- End Desktop menu -->

        <!-- Mobile menu, show/hide based on menu open state. -->
        <div x-show="open" role="dialog" aria-modal="true">
          <div focus="true" class="fixed inset-0 z-10 overflow-y-auto bg-white dark:bg-gray-900 px-6 py-6 lg:hidden">
            <div class="flex h-9 items-center justify-between">
              <div class="flex">
                <a href="#" class="-m-1.5 p-1.5">
                  <span class="sr-only">Your Company</span>
                  <x-application-logo class="h-8"></x-application-logo>
                </a>
              </div>
              <div class="flex">
                <button @click="open = false" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 dark:text-gray-300">
                  <span class="sr-only">Close menu</span>
                  <!-- Heroicon name: outline/x-mark -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="mt-6 flow-root">
              <div class="-my-6 divide-y divide-gray-500/10 dark:divide-gray-500">
                <div class="space-y-2 py-6">
                  <a href="{{ route('welcome') }}" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 dark:text-gray-300 hover:bg-gray-400/10">Home</a>
                  <a href="{{ route('welcome') }}/#ourMenu" @click="open = false" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 dark:text-gray-300 hover:bg-gray-400/10">Menu</a>
                </div>

                <div class="py-6">

                  @if (Route::has('login'))
                  @auth
                  <a href="{{ url('/dashboard') }}" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 dark:text-gray-300 hover:bg-gray-400/10">Dashboard</a>
                  @else
                  <a href="{{ route('login') }}" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 dark:text-gray-300 hover:bg-gray-400/10">Log in</a>
                  @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-6 text-gray-900 dark:text-gray-300 hover:bg-gray-400/10">Register</a>
                  @endif
                  @endauth
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End mobile menu -->
      </div>
    </div>
    <!-- End menu -->
    <main>
      {{ $slot }}
    </main>

    <footer class="text-center py-8">
      © {{ now()->format('Y') }} - renehuanca999@gmail.com
    </footer>
  </div>
</body>

</html>
