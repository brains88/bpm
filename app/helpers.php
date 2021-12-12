<?php 

if (!function_exists('retitle')) {
    function retitle($property) {
        if (empty($property)) {
            throw new \Exception('Invalid property passed for title generation');
        }

        $category = $property->category->name ?? '';
        $action = $property->action ? ucwords($property->action) : '';
        $bedrooms = $property->bedrooms ?? '';
        $condition = $property->condition ?? '';
        switch ($category) {
            case 'lands':
                return 'Landed Property '. $action.' Located at '. $property->address ?? '';
                break;
            case 'residential':
                return $condition.' '.$bedrooms.' bedroom apartment '.($property->house->name ?? '').' '.$action.' Located at '.$property->address ?? '';
                break;
            case 'commercial':
                return $condition.' '.($property->house->name ?? '').' '.$action.' Located at '.$property->address ?? '';
                break;
            default:
                return ucfirst($category).' Building '. $action.' Located at '. $property->address ?? '';
                break;
        }
    }
}
