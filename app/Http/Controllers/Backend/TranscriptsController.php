<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transcript;

class TranscriptsController extends Controller
{
    public function index()
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
}
