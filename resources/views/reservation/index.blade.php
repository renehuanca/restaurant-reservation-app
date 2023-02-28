<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ __('Reservations') }}
		</h2>
	</x-slot>




	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<!-- Breadcrumb -->
			<nav class="flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
				<ol class="inline-flex items-center space-x-1 md:space-x-3">
					<li class="inline-flex items-center">
						<a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
							<svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
							</svg>
							Dashboard
						</a>
					</li>
					<li>
						<div class="flex items-center">
							<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
							</svg>
							<a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Templates</a>
						</div>
					</li>
					<li aria-current="page">
						<div class="flex items-center">
							<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
							</svg>
							<span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>
						</div>
					</li>
				</ol>
			</nav>
			<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 text-gray-900 dark:text-gray-100">

					<!-- component -->
					<div class="">
						<div class="flex flex-col sm:flex-row items-center justify-between pb-4">
							<a href="{{ route('reservations.create') }}" class="space-x-8">
								<button class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">{{ __('New Reservation') }}</button>
							</a>
							<div class="flex items-center p-2 gap-2 rounded-md">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
								</svg>

								<div x-data="{search: '{{$search}}'}">
									<x-text-input x-model="search" id="search" name="search" type="text" class="mt-1 block w-full" autofocus autocomplete="search" placeholder="Search..." @input.debounce.500ms="
							window.location.href = 'http://localhost:8000/reservations/?search='+search
						" />
									<x-input-error class="mt-2" :messages="$errors->get('search')" />
								</div>
							</div>
						</div>

						<div>
							<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
								<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
									<table class="min-w-full leading-normal">
										<thead>
											<tr>
												<th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
													Name
												</th>
												<th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
													Email
												</th>
												<th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
													Phone
												</th>
												<th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
													Reservation Date
												</th>
												<th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
													Guest Number
												</th>
												<th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
													Tables
												</th>
											</tr>
										</thead>
										<tbody>
											@if (count($reservations) == 0)
											<tr>
												<td colspan="6" class="px-5 py-5 bg-white dark:bg-gray-800 text-sm">
													<p class="text-gray-900 dark:text-gray-200 whitespace-no-wrap text-center">No results found ...</p>
												</td>
											</tr>
											@else
											@foreach ($reservations as $reservation)
											<tr>
												<td class="px-5 py-5 border-b border-gray-200 dark:border-gray-500 bg-white dark:bg-gray-800 text-sm">
													<p class="text-gray-900 dark:text-gray-200 whitespace-no-wrap">
														{{ $reservation->first_name }}
														{{ $reservation->last_name }}
													</p>
												</td>
												<td class="px-5 py-5 border-b border-gray-200 dark:border-gray-500 bg-white dark:bg-gray-800 text-sm">
													<p class="text-gray-900 dark:text-gray-200 whitespace-no-wrap">{{ $reservation->email }}</p>
												</td>
												<td class="px-5 py-5 border-b border-gray-200 dark:border-gray-500 bg-white dark:bg-gray-800 text-sm">
													<p class="text-gray-900 dark:text-gray-200 whitespace-no-wrap">
														{{ $reservation->phone }}
													</p>
												</td>
												<td class="px-5 py-5 border-b border-gray-200 dark:border-gray-500 bg-white dark:bg-gray-800 text-sm">
													<p class="text-gray-900 dark:text-gray-200 whitespace-no-wrap">
														{{ $reservation->to_date }}
													</p>
												</td>
												<td class="px-5 py-5 border-b border-gray-200 dark:border-gray-500 bg-white dark:bg-gray-800 text-sm">
													<p class="text-gray-900 dark:text-gray-200 whitespace-no-wrap">
														{{ $reservation->guest_number }}
													</p>
												</td>
												<td class="px-5 py-5 border-b border-gray-200 dark:border-gray-500 bg-white dark:bg-gray-800 text-sm">
													<p class="text-gray-900 dark:text-gray-200 whitespace-no-wrap">
														Table 2
													</p>
												</td>
											</tr>
											@endforeach
											@endif
										</tbody>
									</table>
									<div class="px-5 py-5 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-500">
										{{ $reservations->links('vendor.pagination.tailwind') }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>