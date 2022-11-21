<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class TimeBetweenOpenShedule implements Rule
{
	private $earliestTime;
	private $lastTime;


	public function __construct()
	{
		$this->earliestTime = '17:00:00';	
		$this->lastTime = '23:00:00';
	}

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
	{
		$pickupDate = Carbon::parse($value);
		$pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
		$earliestTime = Carbon::createFromTimeString($this->earliestTime);
		$lastTime = Carbon::createFromTimeString($this->lastTime);

		return $pickupTime->isBetween($earliestTime, $lastTime);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
		return __('Please choose the time between ') . $this->earliestTime . '-' . $this->lastTime . '.';
    }
}
