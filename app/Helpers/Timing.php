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
	 * @type boolean
	 */
	public static $expired = false;

	/**
	 * Expiry date
	 * 
	 * @type date format
	 */
	public static $expiry = null;

	/**
	 * Timing duration (e.g., 200days)
	 * 
	 * @type int
	 */
	public static $duration = 0;

	/**
	 */
	public function __construct((int)$duration = 0, (int)$progress = 0, (boolean)$expired = false, (int)$remainingdays = 0)
	{
		$this->expired = $expired;
		$this->remainingdays = $remainingdays;
		$this->progress = $progress;
		$this->duration = $duration;
	}

	/**
	 * Calculate durations
	 */
	public static function calculate((string)$expiry = '', (int)$duration = 0) : self
	{
		$remainingdays = (Carbon::parse($expiry))->diffInDays(Carbon::today());
		$fraction = $duration > $remainingdays ? ($remainingdays/$duration) : 0;
		return new Timing($duration, (100 - round($fraction * 100)), ($fraction === 0), $remainingdays);
	}

	/**
	 * Expired timing duration
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
	public function remainingdays() : int
	{
		return $this->remainingdays;
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