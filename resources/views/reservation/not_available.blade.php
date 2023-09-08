<x-landing-layout>
  <x-slot name="title">There are not tables available</x-slot>

  <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
          <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
              <div class="ml-4 text-lg text-gray-500 dark:text-gray-300 border-r border-gray-400 tracking-wider">
                  {{ __('Ups!! there are not tables available.') }}                    </div>
                <div class="px-4 text-lg ">
                    <a href="{{ route('welcome') }}">
                        <x-primary-button>Back to Home</x-primary-button>
                    </a>
                </div>
          </div>
      </div>
  </div>
</x-landing-layout>