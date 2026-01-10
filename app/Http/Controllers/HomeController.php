<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $skills = \App\Models\Skill::where('status', 'Tampil')->orderBy('nama_keahlian')->get();
        $projects = \App\Models\Project::where('status', 'Tampil')->orderByRaw('tahun_proyek DESC, nama_proyek ASC')->get();
        
        return view('home', compact('skills', 'projects'));
    }

    public function show(\App\Models\Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
