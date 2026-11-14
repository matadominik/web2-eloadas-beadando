<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JegySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lines = file(database_path('seeders/data/jegy.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        array_shift($lines);

        $rows = [];
        foreach ($lines as $line) 
        {
            [$diakid, $datum, $ertek, $tipus, $targyid] = explode("\t", rtrim($line, "\r\n"));
            $rows[] = [
                'diakid' => $diakid,
                'datum' => str_replace('.', '-', $datum),
                'ertek' => $ertek,
                'tipus' => $tipus,
                'targyid' => $targyid
            ];
        }

        foreach (array_chunk($rows, 500) as $chunk)
        {
            DB::table('jegy')->insert($chunk);
        }
    }
}
