<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required',
            'tahun_proyek' => 'required|integer',
            'jenis_proyek' => 'required',
            'gambar_proyek' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_demo' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:10240', // 10MB limit
        ]);

        $data = $request->except(['gambar_proyek', 'video_demo']);

        if ($request->hasFile('gambar_proyek')) {
            $file = $request->file('gambar_proyek');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/projects'), $filename);
            $data['gambar_path'] = 'uploads/projects/' . $filename;
        }

        if ($request->hasFile('video_demo')) {
            $file = $request->file('video_demo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/projects'), $filename);
            $data['video_path'] = 'uploads/projects/' . $filename;
        }

        \App\Models\Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Data proyek berhasil ditambahkan');
    }

    public function edit(\App\Models\Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Project $project)
    {
        $request->validate([
            'nama_proyek' => 'required',
            'tahun_proyek' => 'required|integer',
            'jenis_proyek' => 'required',
            'gambar_proyek' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_demo' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:10240',
        ]);

        $data = $request->except(['gambar_proyek', 'video_demo']);

        if ($request->hasFile('gambar_proyek')) {
            // Delete old image if exists
            if ($project->gambar_path && file_exists(public_path($project->gambar_path))) {
                unlink(public_path($project->gambar_path));
            }
            
            $file = $request->file('gambar_proyek');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/projects'), $filename);
            $data['gambar_path'] = 'uploads/projects/' . $filename;
        }

        if ($request->hasFile('video_demo')) {
            // Delete old video if exists
            if ($project->video_path && file_exists(public_path($project->video_path))) {
                unlink(public_path($project->video_path));
            }

            $file = $request->file('video_demo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/projects'), $filename);
            $data['video_path'] = 'uploads/projects/' . $filename;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Data proyek berhasil diperbarui');
    }

    public function destroy(\App\Models\Project $project)
    {
        if ($project->gambar_path && file_exists(public_path($project->gambar_path))) {
            unlink(public_path($project->gambar_path));
        }
        if ($project->video_path && file_exists(public_path($project->video_path))) {
            unlink(public_path($project->video_path));
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Data proyek berhasil dihapus');
    }
}
