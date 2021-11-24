<?php

namespace App\Helpers;
use \Exception;


/**
 * Helpers for the app
 */
class Property
{
	/**
	 * List of all property actions
	 */
	public static $actions = ['sale' => 'For Sale', 'rent' => 'For Rent', 'sold' => 'Sold', 'lease' => 'For Lease'];

	/**
	 * Generate title for respective properties
	 * Based on category
	 */
	public function title(object $property)
	{
		if (empty($property)) {
			throw new Exception('Invalid property passed for title generation');
		}

		$category = $property->category->name ?? '';
	    $status = $property->status ? ucwords($property->status) : '';
	    $bedrooms = $property->bedrooms ?? '';
	    $condition = $property->condition ?? '';
	    switch ($category) {
	        case 'lands':
	            return 'Landed Property '. $status.' Located at '. $property->address ?? '';
	            break;
	        case 'residential':
	            return $condition.' '.$bedrooms.' bedroom '.($property->house->name ?? '').' '.$status.' Located at '.$property->address ?? '';
	            break;
	        case 'commercial':
	            return $condition.' '.($property->house->name ?? '').' '.$status.' Located at '.$property->address ?? '';
	            break;
	        default:
	            return ucfirst($category).' Building '. $status.' Located at '. $property->address ?? '';
	            break;
	    }
	}

	/**
	 * Get property action for display
	 */
	public function action(string $action = '')
	{
		foreach (self::$actions as $key => $value) {
			return array_key_exists($action, self::$actions) ? $value : 'Nill';
			//return in_array($action, self::$actions) ? $value : 'Nill';
		}
		// return collect(self::$actions)->map(function ($key, $value) use($action) {
	 //        return $actions[$action] = $value ? $value : 'Nill';
	 //    });
	}

}