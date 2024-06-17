<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makul;

class MakulController extends Controller
{
    public function index()
    {
        return Makul::all();
    }

    public function show($kode_makul)
    {
        return Makul::find($kode_makul);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_makul' => 'required|unique:makul,kode_makul',
            'nama_makul' => 'required',
            'sks' => 'required|integer',
        ]);

        return Makul::create($validatedData);
    }

    public function update(Request $request, $kode_makul)
    {
        $makul = Makul::findOrFail($kode_makul);
        $makul->update($request->all());

        return $makul;
    }

    public function destroy($kode_makul)
    {
        $makul = Makul::findOrFail($kode_makul);
        $makul->delete();

        return response()->noContent();
    }
}
