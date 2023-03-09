<x-landing-layout>
  <x-slot name="title">Home</x-slot>

  <!-- Home section -->
  <div class="relative px-6 lg:px-8">
    <div class="mx-auto max-w-3xl pt-8 pb-32 sm:pt-8 sm:pb-40 relative z-1">
      <div>
        <img class="flex m-auto w-[200] sm:w-[250] pb-10" src="{{ asset('img/comida.png') }}" alt="">
        <h1 class="text-4xl font-bold tracking-tight text-center dark:text-gray-100 sm:text-6xl">Reservations App</h1>
        <p class="mt-6 text-lg leading-8 text-gray-800 dark:text-gray-300 text-center">Welcome to our website, enjoy your stay.</p>
        <div class="mt-8 flex gap-x-4 justify-center">
          <a href="{{ route('reservations.step_one') }}" class="inline-block rounded-lg bg-indigo-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700">
            Make a Reservation
            <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Menu section -->
  <div class="relative px-6 lg:px-8">
    <div class="mx-auto max-w-3xl pt-8 pb-32 sm:pt-8 sm:pb-40 relative z-1">
        <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
          <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

          <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <div class="group relative">
              <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 dark:bg-gray-800 group-hover:opacity-75 lg:aspect-none lg:h-80">
                <img src="{{ asset('img/plato-1.jpg') }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
              </div>
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-sm text-gray-700 dark:text-gray-500">
                    <a href="#">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Basic Tee
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Black</p>
                </div>
                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">$35</p>
              </div>
            </div>
       
            <div class="group relative">
              <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 dark:bg-gray-800 group-hover:opacity-75 lg:aspect-none lg:h-80">
                <img src="{{ asset('img/plato-2.jpg') }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
              </div>
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-sm text-gray-700 dark:text-gray-500">
                    <a href="#">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Basic Tee
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Black</p>
                </div>
                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">$35</p>
              </div>
            </div>

            <div class="group relative">
              <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 dark:bg-gray-800 group-hover:opacity-75 lg:aspect-none lg:h-80">
                <img src="{{ asset('img/plato-3.jpg') }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
              </div>
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-sm text-gray-700 dark:text-gray-500">
                    <a href="#">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Basic Tee
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Black</p>
                </div>
                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">$35</p>
              </div>
            </div>

            <div class="group relative">
              <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 dark:bg-gray-800 group-hover:opacity-75 lg:aspect-none lg:h-80">
                <img src="{{ asset('img/plato-4.jpg') }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
              </div>
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-sm text-gray-700 dark:text-gray-500">
                    <a href="#">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Basic Tee
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Black</p>
                </div>
                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">$35</p>
              </div>
            </div>

            <!-- More products... -->
          </div>
        </div>
    </div>
  </div>
</x-landing-layout>