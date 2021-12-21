<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Country, State, City};
use Storage;
   
class GlobesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . '/json/globe.json';
        $globes = json_decode(file_get_contents($path)); 

        foreach ($globes as $country) {
            $nation = Country::create([
                'currency' => $country->currency,
                'iso2' => $country->iso2, 
                'capital' => $country->capital, 
                'iso3' => $country->iso3, 
                'name' => $country->name, 
                'phonecode' => $country->phone_code, 
                'region' => $country->region, 
            ]);

            if (isset($country->states)) {
                foreach ($country->states as $state) {
                    $division = State::create([
                        'country_id' => $nation->id,
                        'name' => $state->name,
                    ]);

                    if (isset($state->cities)) {
                        foreach ($state->cities as $city) {
                            $division = City::create([
                                'country_id' => $nation->id,
                                'name' => $city->name,
                                'state_id' => $division->id,
                            ]);
                        }
                            
                    }  
                }
            }    
        }
    }
}