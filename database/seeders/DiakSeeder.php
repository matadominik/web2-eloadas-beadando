<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lines = file(database_path('seeders/data/diak.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        array_shift($lines);

        foreach ($lines as $line) 
        {
            [$id, $nev, $osztaly, $fiu] = explode("\t", rtrim($line, "\r\n"));
            DB::table('diak')->insert([
                'id' => $id,
                'nev' => $nev,
                'osztaly' => $osztaly,
                'fiu' => ($fiu == -1 ? 1 : 0)
            ]);
        }
    }
}
