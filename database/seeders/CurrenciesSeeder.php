<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path('currencies.sql');
        $sql = file_get_contents($path);
        \DB::unprepared($sql);
    }
}
