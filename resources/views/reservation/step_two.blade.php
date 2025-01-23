<x-landing-layout>
	<x-slot name="title">Make reservation step two</x-slot>

	<div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-md border-2 dark:border-none sm:rounded-lg">
                <div class="max-w-xl">
					<section>
						<header>
							<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100"><span class="font-bold">STEP 2:</span> 
								Make Reservation
							</h2>
							<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Select the table you want.</p>
						</header>
						<form method="post" action="{{ route('reservations.store') }}" class="mt-6 space-y-6">
							@csrf

							<div x-data="{ table: ''}" >
								<x-input-label for="tabla_id" :value="__('Table')" />
								<select x-model="table" @change="function() {
										const buttons = document.getElementsByClassName('table_button')
										for (let i = 0; i < buttons.length; i++) {
											if (buttons[i].value == table) {
												buttons[i].firstElementChild.src = '{{ asset("img/table-4-guests-selected.png") }}'
												break
											}
										}
										for (let i = 0; i < buttons.length; i++) {
											if (table != buttons[i].value) {
												buttons[i].firstElementChild.src = '{{ asset("img/table-4-guests.png") }}'
											}
										}
										for (let i = 0; i < buttons.length; i++) {
											if (buttons[i].disabled) {
												buttons[i].firstElementChild.src = '{{ asset("img/table-4-guests-unavailable.png") }}'
											}
										}
									}" name="table_id" id="table_id" required class='block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'>
									<option value="" disabled> Select a Table</option>
									@foreach($tablesAvailable as $table)
									<option value="{{ $table->id }}">{{ $table->name }} ({{ $table->guest_number }} Guests)</option>
									@endforeach
								</select>

								<x-input-error class="mt-2" :messages="$errors->get('table_id')" />
								
								<div class="flex align-center justify-center">
									<div class="grid grid-rows-2 grid-flow-col gap-4 mt-4 h-[200px] w-[380px] pt-16 px-2 object-cover rounded-md" style="background: url('{{asset("img/bg-restaurant.png")}}') no-repeat; background-position: 0px 2px;">
									@foreach ($allTables as $table)
									<button value="{{ $table->id }}" @if($tablesAvailable->find($table->id) == null) disabled @endif class="table_button" type="button" @click="
											table = {{ $table->id }}
											const buttons = document.getElementsByClassName('table_button')
											$event.target.src = '{{ asset("img/table-4-guests-selected.png") }}'

											for (let i = 0; i < buttons.length; i++) {
												if ($event.target.parentNode.value != buttons[i].value) {
													buttons[i].firstElementChild.src = '{{ asset("img/table-4-guests.png") }}'
												}
											}
											for (let i = 0; i < buttons.length; i++) {
												if (buttons[i].disabled) {
													buttons[i].firstElementChild.src = '{{ asset("img/table-4-guests-unavailable.png") }}'
												}
											}
										">
										@if($tablesAvailable->find($table->id) == null)
										<img value="{{ $table->id }}" src="{{ asset('img/table-4-guests-unavailable.png') }}" alt="table unavailable"/>
										@else
										<img value="{{ $table->id }}" src="{{ asset('img/table-4-guests.png') }}" alt="table"/>
										@endif
									</button>
									@endforeach
									</div>
								</div>
							</div>

							@guest
							<div class="block mt-4">
                  <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Creating an account you will have other benefits.') }}</span>
									<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                    {{ __('Register now?') }}
        		      </a>
							</div>
							@endguest

							@auth
							<div class="block mt-4">
                  <span class="ml-2 text-md text-gray-600 dark:text-gray-400">{{ __('Al realizar una reservación tendras la oportunidad de participar en: sorteos comida gratis, ganar logros y descuentos de cliente frecuente.') }}</span>
							</div>
							@endauth

							<div class="flex items-center gap-4">
								<a href="{{ route('reservations.step_one') }}">
								<button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
									{{ __('Get Back') }}
								</button>
								</a>
								<x-primary-button>{{ __('Make Reservation') }}</x-primary-button>

								@if (session('status') === 'reservated')
									<p
										x-data="{ show: true }"
										x-show="show"
										x-transition
										x-init="setTimeout(() => show = false, 2000)"
										class="text-sm text-gray-600 dark:text-gray-400"
									>Saved.</p>
								@endif
							</div>
						</form>
					</section>
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>