<x-landing-layout>
  <x-slot name="title">Successfully</x-slot>

  <div class="py-12 relative px-6 lg:px-8">
    <div class="mx-auto max-w-3xl pt-8 pb-16 sm:pt-24 sm:pb-20">
      <div>
        <div>
          <h1 class="text-4xl font-bold tracking-tight sm:text-center sm:text-6xl">Tankyou reserved successfully</h1>
          <div class="flex flex-col sm:flex-row justify-between sm:mt-8">
          <table class="text-left mt-8 sm:mt-0 leading-normal">
            <tbody>
              <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Name</th>
                <td class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-sm text-gray-600 dark:text-gray-200">{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
              </tr>
              <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Email</th>
                <td class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-sm text-gray-600 dark:text-gray-200">{{ $reservation->email }}</td>
              </tr>
              <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">Phone</th>
                <td class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-sm text-gray-600 dark:text-gray-200">{{ $reservation->phone }}</td>
              </tr>
              <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">To date</th>
                <td class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-sm text-gray-600 dark:text-gray-200">{{ $reservation->to_date }}</td>
              </tr>
            </tbody>
          </table>
          <div class="max-w-sm mt-4 sm:mt-0 rounded-lg shadow-md bg-gray-100 dark:bg-gray-800 flex justify-between py-4 px-4">
              <img class="m-auto w-[100px] sm:w-[150px]" src="{{ asset('img/comida.png') }}" alt="">
              <div class="ml-4">
                    <h3 class="text-lg font-bold uppercase tracking-wider mb-4">{{ $reservation->table->name }}</h3>
                    <span>GUEST NUMBER: {{ $reservation->table->guest_number }}</span>
                    <span class="text-sm">Location: {{ $reservation->table->location }}</span>
              </div>
          </div>
          </div>
          <div class="mt-8 flex gap-x-4 sm:justify-center">
            <a href="{{ route('reservations.step_one') }}" class="inline-block rounded-lg bg-indigo-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700">
              Back to home page
              <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
          <svg class="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="url(#ecb5b0c9-546c-4772-8c71-4d3f06d544bc)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
            <defs>
              <linearGradient id="ecb5b0c9-546c-4772-8c71-4d3f06d544bc" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                <stop stop-color="#9089FC"></stop>
                <stop offset="1" stop-color="#FF80B5"></stop>
              </linearGradient>
            </defs>
          </svg>
        </div>
      </div>
    </div>
  </div>
</x-landing-layout>