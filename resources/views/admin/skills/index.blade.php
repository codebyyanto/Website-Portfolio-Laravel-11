@extends('layouts.app')

@section('title', 'Admin - Daftar Keahlian')

@section('content')
<div class="container mx-auto px-4 pt-24 pb-8">
    <!-- Header & Add Button -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-slate-100">Kelola Keahlian</h1>
        <div class="space-x-4">
            <a href="{{ route('admin.projects.index') }}" class="text-slate-400 hover:text-slate-200 transition-colors">
                <i class="fas fa-project-diagram mr-1"></i> Kelola Proyek
            </a>
            <a href="{{ route('admin.skills.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                <i class="fas fa-plus mr-2"></i> Tambah Keahlian
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500 text-green-500 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-slate-900/60 rounded-2xl border border-slate-700/50 overflow-hidden">
        <table class="w-full text-left text-slate-300">
            <thead class="bg-slate-800/60 text-slate-100 uppercase text-sm font-semibold">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Icon</th>
                    <th class="px-6 py-4">Nama Keahlian</th>
                    <th class="px-6 py-4">Deskripsi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/50">
                @forelse($skills as $index => $skill)
                <tr class="hover:bg-slate-800/30 transition-colors">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                        @if($skill->icon_path && file_exists(public_path($skill->icon_path)))
                            <img src="{{ asset($skill->icon_path) }}" alt="Icon" class="w-8 h-8 object-contain">
                        @else
                            <i class="fas fa-code text-slate-500 text-xl"></i>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-slate-100">{{ $skill->nama_keahlian }}</td>
                    <td class="px-6 py-4 text-sm text-slate-400 max-w-xs truncate">{{ $skill->deskripsi }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $skill->status == 'Tampil' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                            {{ $skill->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="text-yellow-400 hover:text-yellow-300" title="Edit"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus keahlian ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300" title="Hapus"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                        Belum ada data keahlian.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
