<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diak;

class StudentController extends Controller
{
    public function index()
    {
        $students = Diak::orderBy('id', 'asc')->paginate(25);

        return view('crud.index', compact('students'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'osztaly' => 'required|string|max:255',
            'fiu' => 'required|boolean'
        ]);

        Diak::create($validated);

        return redirect()->route('crud.index');
    }

    public function edit(Diak $diak)
    {
        return view('crud.edit', compact('diak'));
    }

    public function update(Request $request, Diak $diak)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'osztaly' => 'required|string|max:255',
            'fiu' => 'required|boolean'
        ]);

        $diak->update($validated);

        return redirect()->route('crud.index');
    }

    public function destroy(Diak $diak)
    {
        $diak->delete();

        return redirect()->route('crud.index');
    }

    public function apiIndex()
    {
        return response()->json(
            Diak::orderBy('id', 'asc')->get()
        );
    }

    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'osztaly' => 'required|string|max:255',
            'fiu' => 'required|boolean',
        ]);

        $student = Diak::create($validated);

        return response()->json($student, 201);
    }

    public function apiUpdate(Request $request, Diak $diak)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'osztaly' => 'required|string|max:255',
            'fiu' => 'required|boolean',
        ]);

        $diak->update($validated);

        return response()->json($diak->fresh());
    }

    public function apiDestroy(Diak $diak)
    {
        $diak->delete();

        return response()->json(['message' => 'Student deleted successfully.']);
    }

}
