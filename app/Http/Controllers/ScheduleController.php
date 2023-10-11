<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //index
    public function index()
    {
        $schedules = Schedule::paginate(10);
        return view('pages.schedules.index', compact('schedules'));
    }

    // function for generate qrcode input
    public function generateQrCode(Schedule $schedule)
    {
        return view('pages.schedules.input-qrcode')->with('schedule', $schedule);
    }

    // function for generate qrcode and update code to Schedule
    public function generateQrCodeUpdate(Request $request, Schedule $schedule)
    {
        $request->validate([
            'code' => 'required',
        ]);


        //update kode_absensi with code from input to schedule
        $schedule->update([
            'kode_absensi' => $request->code,
        ]);

        $code = $request->code;


        return view('pages.schedules.show-qrcode', compact('code'))->with('success', 'Code updated successfully.');

        // $schedule = Schedule::where('id', $request->id)->first();
        // if ($schedule) {
        //     $schedule->update([
        //         'code' => $request->code,
        //     ]);
        //     return view('pages.schedules.input-qrcode', compact('schedule'))->with('success', 'Code updated successfully.');
        // } else {
        //     return redirect()->route('pages.schedules.index')->with('error', 'Code not found.');
        // }
    }
}
