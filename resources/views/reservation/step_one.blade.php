<x-landing-layout>
	<x-slot name="title">Make reservation</x-slot>

	<div class="py-12">
		<div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
			<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-md border-2 dark:border-none sm:rounded-lg">
				<div class="max-w-xl">
					<section>
						<header>
							<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100"><span class="font-bold">STEP 1:</span> Make Reservation</h2>
							<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Make a reservation, enter your data.</p>
						</header>
						<form method="get" action="{{ route('reservations.step_two') }}" class="mt-6 space-y-6">
							@csrf

							<div>
								<x-input-label for="first_name" :value="__('First Name')" />
								<x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="'Juan'" required autofocus autocomplete="first_name" />
								<x-input-error class="mt-2" :messages="$errors->get('first_name')" />
							</div>

							<div>
								<x-input-label for="last_name" :value="__('Last Name')" />
								<x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="'Mamani'" required autocomplete="last_name" />
								<x-input-error class="mt-2" :messages="$errors->get('last_name')" />
							</div>

							<div>
								<x-input-label for="email" :value="__('Email')" />
								<x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="'juan@gmail.com'" required autocomplete="email" />
								<x-input-error class="mt-2" :messages="$errors->get('email')" />
							</div>

							<div>
								<x-input-label for="phone" :value="__('Phone Number')" />
								<x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="'748484'" required autocomplete="phone" />
								<x-input-error class="mt-2" :messages="$errors->get('phone')" />
							</div>

							<div>
								<x-input-label for="to_date" :value="__('Reservation Date (Please choose the time between 17:00-23:00)')" />
								<x-text-input id="to_date" name="to_date" type="datetime-local" min="{{$minDate->format('Y-m-d\TH:i:s')}}" max="{{$maxDate->format('Y-m-d\TH:i:s')}}" class="mt-1 block w-full" :value="old('to_date', $reservation['to_date'])" required autocomplete="name" />
								<x-input-error class="mt-2" :messages="$errors->get('to_date')" />
							</div>

							<div>
								<x-input-label for="guest_number" :value="__('Guest Number')" />
								<x-text-input id="guest_number" name="guest_number" type="text" class="mt-1 block w-full" value="2" required autocomplete="phone" />
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
</x-landing-layout>