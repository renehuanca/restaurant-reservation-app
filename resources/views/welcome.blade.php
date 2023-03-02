<x-landing-layout>
  <x-slot name="title">Home</x-slot>

  <!-- Home section -->
  <div class="relative px-6 lg:px-8">
    <div class="mx-auto max-w-3xl pt-20 pb-32 sm:pt-32 sm:pb-40 relative z-1">
      <div>
        <img class="hidden sm:flex sm:m-auto w-[100] pb-10" src="{{ asset('img/comida.png') }}" alt="">
        <h1 class="text-4xl font-bold tracking-tight sm:text-center dark:text-gray-100 sm:text-6xl">Reservations App</h1>
        <p class="mt-6 text-lg leading-8 text-gray-800 dark:text-gray-300 sm:text-center">Welcome to our website, enjoy your stay.</p>
        <div class="mt-8 flex gap-x-4 sm:justify-center">
          <a href="{{ route('reservations.step_one') }}" class="inline-block rounded-lg bg-indigo-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700">
            Make a Reservation
            <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</x-landing-layout>