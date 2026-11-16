<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jegy;

class ChartController extends Controller
{
    public function getDatas()
    {
        $stats = Jegy::select('ertek', DB::raw('count(*) as db'))
            ->groupBy('ertek')
            ->orderBy('ertek')
            ->get();

        $labels = $stats->pluck('ertek');
        $values = $stats->pluck('db');

        return view('stats', compact('labels', 'values'));
    }
}
