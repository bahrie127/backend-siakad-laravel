<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ScheduleController extends Controller
{
    //index
    public function index()
    {
        //with pagination
        $schedules = \App\Models\Schedule::paginate(10);
        // $schedules = \App\Models\Schedule::all();
        return view('pages.schedule.index', compact('schedules'));
    }

    //show
    public function show($id)
    {
        $schedule = \App\Models\Schedule::find($id);
        return view('pages.schedule.show', compact('schedule'));
    }

    //create qrcode
    public function createQrcode()
    {
        return view('pages.schedule.qrcode');
    }

    // //generate qrcode
    public function generateQrcode(Request $request)
    {
        $request->validate([
            'code' => 'required',

        ]);

        $code = $request->code;

        return view('pages.schedule.show-qrcode', compact('code'));
    }

    //create
    public function create()
    {
        return view('schedule.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'lecturer_id' => 'required',
            'semester' => 'required',
            'tahun_akademik' => 'required',
            'sks' => 'required',
            'kode_matakuliah' => 'required',
            'deskripsi' => 'required',
        ]);

        $schedule = new \App\Models\Schedule;
        $schedule->title = $request->get('title');
        $schedule->lecturer_id = $request->get('lecturer_id');
        $schedule->semester = $request->get('semester');
        $schedule->tahun_akademik = $request->get('tahun_akademik');
        $schedule->sks = $request->get('sks');
        $schedule->kode_matakuliah = $request->get('kode_matakuliah');
        $schedule->deskripsi = $request->get('deskripsi');
        $schedule->save();

        return redirect()->route('schedule.index')->with('success', 'Schedule has been created successfully.');
    }
}
