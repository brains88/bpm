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

if (!function_exists('randomhex')) {
    function randomhex() {
        $code = substr(md5(rand()), 0, 6);
        return '#'.$code;
    }
}

if (!function_exists('randomrgba')) {
    function randomrgba($opacity = 0.5) {
        return 'rgba('.rand(0, 255).','. rand(0, 255).','. rand(0, 255).','. $opacity.')';
    }
}


if (!function_exists('firstname')) {
    function firstname($fullname = '') {
        return empty($fullname) ? '' : (explode(' ', $fullname)[0] ?? '');
    }
}

if (!function_exists('months')) {
    function months() {
        return [
            'January', 
            'February', 
            'March', 
            'April', 
            'May', 
            'June', 
            'July', 
            'August', 
            'September', 
            'October', 
            'November', 
            'December'
        ];
    }
}
