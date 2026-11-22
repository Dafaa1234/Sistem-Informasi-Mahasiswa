<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    // Menampilkan data mahasiswa
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('nama', 'asc')
            ->paginate(10);

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // Menampilkan formulir tambah
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Menyimpan data mahasiswa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:30|unique:mahasiswa,nim',
            'nama' => 'required|string|max:255',
            'prodi' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:10',
            'email' => 'nullable|email|max:255|unique:mahasiswa,email',
            'alamat' => 'nullable|string',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Menampilkan detail mahasiswa
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // Menampilkan formulir edit
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Memperbarui data mahasiswa
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => [
                'required',
                'string',
                'max:30',
                Rule::unique('mahasiswa', 'nim')->ignore($mahasiswa->id),
            ],
            'nama' => 'required|string|max:255',
            'prodi' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:10',
            'email' => [
                'nullable',
                'email',
                Rule::unique('mahasiswa', 'email')->ignore($mahasiswa->id),
            ],
            'alamat' => 'nullable|string',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    // Menghapus data mahasiswa
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
