<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transcript;
use App\Imports\TranscriptsImport;
use Maatwebsite\Excel\Facades\Excel;

class TranscriptsController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.transcripts.index')->with(['transcripts' => Transcript::all()]);
    }
    public function create()
    {

    }
    public function store()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }

    public function import(Request $request)
    {
        $file = $request->file('transcript-file');

        Excel::import(new TranscriptsImport, request()->file('transcript-file'));

        return redirect()->route('backend.transcripts.index')->with(['status' => 'create success']);
    }
}
