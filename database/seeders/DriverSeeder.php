<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drivers = [
            [
                'id' => 9,
                'name' => 'Eduardo B.'
            ],
            [
                'id' => 10,
                'name' => 'José N.'
            ],
            [
                'id' => 11,
                'name' => 'Mauricio J.'
            ],
            [
                'id' => 12,
                'name' => 'Miguel T.'
            ],
            [
                'id' => 13,
                'name' => 'Álvaro T.'
            ],
            [
                'id' => 14,
                'name' => 'Juan D.'
            ],
            [
                'id' => 15,
                'name' => 'Ariel F.'
            ],
            [
                'id' => 16,
                'name' => 'Carlos M.'
            ],
            [
                'id' => 17,
                'name' => 'Roberto R.'
            ],
            [
                'id' => 18,
                'name' => 'Basilio M.'
            ],
            [
                'id' => 19,
                'name' => 'Jorge G.'
            ],
            [
                'id' => 20,
                'name' => 'Felipe V.'
            ],
        ];

        DB::table('drivers')->insert($drivers);
    }
}
