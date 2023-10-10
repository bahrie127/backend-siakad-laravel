<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //index
    public function index()
    {
        //with pagination
        $subjects = \App\Models\Subject::paginate(10);
        // $subjects = \App\Models\Subject::all();
        return view('pages.subject.index', compact('subjects'));
    }

    //create
    public function create()
    {
        return view('subject.create');
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

        $subject = new \App\Models\Subject;
        $subject->title = $request->get('title');
        $subject->lecturer_id = $request->get('lecturer_id');
        $subject->semester = $request->get('semester');
        $subject->tahun_akademik = $request->get('tahun_akademik');
        $subject->sks = $request->get('sks');
        $subject->kode_matakuliah = $request->get('kode_matakuliah');
        $subject->deskripsi = $request->get('deskripsi');
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject has been created successfully.');
    }

    //show
    public function show($id)
    {
        $subject = \App\Models\Subject::find($id);
        return view('subject.show', compact('subject'));
    }

    //edit
    public function edit($id)
    {
        $subject = \App\Models\Subject::find($id);
        return view('subject.edit', compact('subject'));
    }

    //update
    public function update(Request $request, $id)
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

        $subject = \App\Models\Subject::find($id);
        $subject->title = $request->get('title');
        $subject->lecturer_id = $request->get('lecturer_id');
        $subject->semester = $request->get('semester');
        $subject->tahun_akademik = $request->get('tahun_akademik');
        $subject->sks = $request->get('sks');
        $subject->kode_matakuliah = $request->get('kode_matakuliah');
        $subject->deskripsi = $request->get('deskripsi');
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject has been updated successfully.');
    }

    //destroy
    public function destroy($id)
    {
        $subject = \App\Models\Subject::find($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject has been deleted successfully.');
    }
}
