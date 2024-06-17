<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        return Dosen::all();
    }

    public function show($nidn)
    {
        return Dosen::find($nidn);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nidn' => 'required|unique:dosen,nidn',
            'nama_dosen' => 'required',
        ]);

        return Dosen::create($validatedData);
    }

    public function update(Request $request, $nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $validatedData = $request->validate([
            'nidn' => 'required|unique:dosen,nidn,' . $dosen->nidn . ',nidn',
            'nama_dosen' => 'required',
        ]);

        $dosen->update($validatedData);

        return $dosen;
    }

    public function destroy($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $dosen->delete();

        return response()->noContent();
    }
}
