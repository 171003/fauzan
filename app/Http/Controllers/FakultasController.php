<?php
namespace App\Http\Controllers;

use App\Models\fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakulta = Fakultas::all();
        return view('fakultas.index', compact('fakulta'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required|string|max:255',
            'pimpinan_fakultas' => 'required|string|max:255',
        ]);

        Fakultas::create($request->all());

        return redirect()->route('fakultas.index')->with('success', 'Fakulta created successfully.');
    }

    public function edit(fakultas $fakulta)
    {
        return view('fakultas.edit', compact('fakulta'));
    }

    public function update(Request $request, Fakultas $fakulta)
    {
        $request->validate([
            'nama_fakultas' => 'required|string|max:255',
            'pimpinan_fakultas' => 'required|string|max:255',
        ]);

        $fakulta->update($request->all());

        return redirect()->route('fakultas.index')->with('success', 'Fakulta updated successfully.');
    }

    public function destroy(Fakultas $fakulta)
    {
        $fakulta->delete();

        return redirect()->route('fakultas.index')->with('success', 'Fakulta deleted successfully.');
    }
}
