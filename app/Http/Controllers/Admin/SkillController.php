<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = \App\Models\Skill::orderBy('nama_keahlian', 'asc')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'nama_keahlian' => 'required|string|max:100|unique:tbkeahlian_23312240,nama_keahlian',
            'kategori_23312240' => 'required|string',
            'deskripsi' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_keahlian.required' => 'Nama keahlian wajib diisi.',
            'nama_keahlian.unique' => 'Nama keahlian sudah ada, harap gunakan nama lain.',
            'kategori_23312240.required' => 'Kategori wajib dipilih.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'icon.required' => 'Icon wajib diupload.',
            'icon.image' => 'File harus berupa gambar.',
        ]);

        $data = $request->except(['icon']);

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/icons'), $filename);
            $data['icon_path'] = 'uploads/icons/' . $filename;
        }

        \App\Models\Skill::create($data);

        return redirect()->route('admin.skills.index')->with('success', 'Data keahlian berhasil ditambahkan');
    }

    public function edit(\App\Models\Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Skill $skill)
    {
        $request->validate([
            'nama_keahlian' => 'required|string|max:100|unique:tbkeahlian_23312240,nama_keahlian,' . $skill->id_keahlian . ',id_keahlian',
            'kategori_23312240' => 'required|string',
            'deskripsi' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_keahlian.required' => 'Nama keahlian wajib diisi.',
            'nama_keahlian.unique' => 'Nama keahlian sudah ada, harap gunakan nama lain.',
            'kategori_23312240.required' => 'Kategori wajib dipilih.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'icon.image' => 'File harus berupa gambar.',
        ]);

        $data = $request->except(['icon']);

        if ($request->hasFile('icon')) {
            if ($skill->icon_path && file_exists(public_path($skill->icon_path))) {
                unlink(public_path($skill->icon_path));
            }

            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/icons'), $filename);
            $data['icon_path'] = 'uploads/icons/' . $filename;
        }

        $skill->update($data);

        return redirect()->route('admin.skills.index')->with('success', 'Data keahlian berhasil diperbarui');
    }

    public function destroy(\App\Models\Skill $skill)
    {
        if ($skill->icon_path && file_exists(public_path($skill->icon_path))) {
            unlink(public_path($skill->icon_path));
        }

        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Data keahlian berhasil dihapus');
    }
}
