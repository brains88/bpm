<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use \Exception;
use \Carbon\Carbon;

/**
 * Calculate timing durations,
 * expiry, days etc
 */
class Timing
{
	/**
	 * Expiry status
	 * 
	 * @type bool
	 */
	public $expired = false;

	/**
	 * Expiry date
	 * 
	 * @type date format
	 */
	public $expiry = null;

	/**
	 * Timing duration (e.g., 200days)
	 * 
	 * @type int
	 */
	public $duration = 0;

	/**
	 */
	public function __construct(int $duration = 0, int $progress = 0, bool $expired = false, int $daysleft = 0)
	{
		$this->duration = $duration;
		$this->progress = $progress;
		$this->expired = $expired;
		$this->daysleft = $daysleft;
	}

	/**
	 * Calculate durations
	 */
	public static function calculate(int $duration = 0, ?string $expiry = '', ?string $current = '') : self
	{

		$daysleft = Carbon::parse($expiry)->diffInDays($current);
		$daysleft = !empty($paused) ? $daysleft + $paused : $daysleft;
		$fraction = $duration >= $daysleft ? ($daysleft/$duration) : 0;
		return new Timing($duration, round(100 - ($fraction * 100)), ($fraction === 0), $daysleft);
	}

	/**
	 * Expired status
	 */
	public function expired() : bool
	{
		return $this->expired;
	}

	/**
	 * Remaining days
	 * 
	 * @return integer
	 */
	public function daysleft() : int
	{
		return $this->daysleft;
	}

	/**
	 * Timing progress (e.g., 10%)
	 * 
	 * @return integer
	 */
	public function progress() : int
	{
		return $this->progress;
	}
}