<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    public function store(Request $request) 
    {
        $data = $request->validate([
            'full_name' => 'required|max:30',
            'email_address' => 'required|max:50',
            'message' => 'required'
        ]);

        Message::create($data);

        return redirect('contact')->with('success', 'Message sent!');
    }
}
