<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request) 
    {
        $request->validate([
            'fullName' => 'required|max:30',
            'emailAddress' => 'required|max:50',
            'inputMessage' => 'required'
        ]);

        dd($request->all());
    }
}
