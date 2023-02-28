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
							<a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Reservation List</a>
						</div>
					</li>
					<li aria-current="page">
						<div class="flex items-center">
							<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
							</svg>
							<span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">New Reservation</span>
						</div>
					</li>
				</ol>
			</nav>
			<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 text-gray-900 dark:text-gray-100">
					make a coponent
					<section>
						<header>
							<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100"><span class="font-bold">STEP 1:</span> Make Reservation</h2>
							<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Make a reservation, enter your data.</p>
						</header>
						<form method="get" action="{{ route('reservation.step_two') }}" class="mt-6 space-y-6">
							@csrf

							<div>
								<x-input-label for="first_name" :value="__('First Name')" />
								<x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $reservation['first_name'])" required autofocus autocomplete="first_name" />
								<x-input-error class="mt-2" :messages="$errors->get('first_name')" />
							</div>

							<div>
								<x-input-label for="last_name" :value="__('Last Name')" />
								<x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $reservation['last_name'])" required autocomplete="last_name" />
								<x-input-error class="mt-2" :messages="$errors->get('last_name')" />
							</div>

							<div>
								<x-input-label for="email" :value="__('Email')" />
								<x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $reservation['email'])" required autocomplete="email" />
								<x-input-error class="mt-2" :messages="$errors->get('email')" />
							</div>

							<div>
								<x-input-label for="phone" :value="__('Phone Number')" />
								<x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $reservation['phone'])" required autocomplete="phone" />
								<x-input-error class="mt-2" :messages="$errors->get('phone')" />
							</div>

							<div>
								<x-input-label for="to_date" :value="__('Reservation Date (Please choose the time between 17:00-23:00)')" />
								<x-text-input id="to_date" name="to_date" type="datetime-local" min="{{$minDate->format('Y-m-d\TH:i:s')}}" max="{{$maxDate->format('Y-m-d\TH:i:s')}}" class="mt-1 block w-full" :value="old('to_date', $reservation['to_date'])" required autocomplete="name" />
								<x-input-error class="mt-2" :messages="$errors->get('to_date')" />
							</div>

							<div>
								<x-input-label for="guest_number" :value="__('Guest Number')" />
								<x-text-input id="guest_number" name="guest_number" type="text" class="mt-1 block w-full" :value="old('guest_number', $reservation['guest_number'])" required autocomplete="phone" />
								<x-input-error class="mt-2" :messages="$errors->get('guest_number')" />
							</div>

							<div class="flex items-center gap-4">
								<x-primary-button>{{ __('Next Step') }}</x-primary-button>

								@if (session('status') === 'reservated')
								<p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">Saved Temporarely.</p>
								@endif
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>