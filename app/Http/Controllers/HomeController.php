<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Statistics
        $totalMahasiswa = User::where('roles', 'mahasiswa')->count();
        $totalDosen = User::where('roles', 'dosen')->count();
        $totalMataKuliah = Subject::count();
        $totalJadwal = Schedule::count();

        // Map day names
        $dayMap = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];
        $hariIni = $dayMap[date('l')] ?? date('l');

        // Today's schedules
        $jadwalHariIni = Schedule::with('subject')
            ->where('hari', $hariIni)
            ->orderBy('jam_mulai')
            ->limit(5)
            ->get();

        // Recent subjects
        $mataKuliahTerbaru = Subject::with('lecturer')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Recent users (mahasiswa)
        $mahasiswaTerbaru = User::where('roles', 'mahasiswa')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('pages.app.dashboard-siakad', compact(
            'totalMahasiswa',
            'totalDosen',
            'totalMataKuliah',
            'totalJadwal',
            'jadwalHariIni',
            'mataKuliahTerbaru',
            'mahasiswaTerbaru',
            'hariIni'
        ));
    }
}
