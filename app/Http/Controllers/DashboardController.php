<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung seluruh mahasiswa
        $totalMahasiswa = Mahasiswa::count();

        // Menghitung seluruh program studi
        $totalProdi = Prodi::count();

        // Menghitung jumlah mahasiswa berdasarkan prodi
        $mahasiswaPerProdi = Mahasiswa::select(
                'prodi',
                DB::raw('COUNT(*) as total')
            )
            ->whereNotNull('prodi')
            ->where('prodi', '<>', '')
            ->groupBy('prodi')
            ->orderByDesc('total')
            ->get();

        return view('dashboard.index', compact(
            'totalMahasiswa',
            'totalProdi',
            'mahasiswaPerProdi'
        ));
    }
}
