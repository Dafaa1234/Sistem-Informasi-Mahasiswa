<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::orderBy('nama', 'asc')->paginate(10);

        return view('prodi.index', compact('prodis'));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:prodi,kode',
            'nama' => 'required|string|max:255',
        ]);

        Prodi::create($validated);

        return redirect()->route('prodi.index')
            ->with('success', 'Program studi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $prodi = Prodi::findOrFail($id);

        return view('prodi.show', compact('prodi'));
    }

    public function edit(string $id)
    {
        $prodi = Prodi::findOrFail($id);

        return view('prodi.edit', compact('prodi'));
    }

    public function update(Request $request, string $id)
    {
        $prodi = Prodi::findOrFail($id);

        $validated = $request->validate([
            'kode' => [
                'required',
                'string',
                'max:20',
                Rule::unique('prodi', 'kode')->ignore($prodi->id),
            ],
            'nama' => 'required|string|max:255',
        ]);

        $prodi->update($validated);

        return redirect()->route('prodi.index')
            ->with('success', 'Program studi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);

        $prodi->delete();

        return redirect()->route('prodi.index')
            ->with('success', 'Program studi berhasil dihapus.');
    }
}
