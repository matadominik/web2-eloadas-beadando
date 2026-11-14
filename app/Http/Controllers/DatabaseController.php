<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jegy;

class DatabaseController extends Controller
{
    public function getDatas()
    {
        $grades = Jegy::with(['diak', 'targy'])->orderBy('datum', 'desc')->paginate(25);

        return view('gradebook', compact('grades'));
    }
}
