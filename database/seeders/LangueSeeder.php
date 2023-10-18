<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Langue;

class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langues = [
            ['langue' => 'Anglais'],
            ['langue' => 'Français'],
            ['langue' => 'Portugais'],
        ];

        Langue::insert($langues);
    }
}
