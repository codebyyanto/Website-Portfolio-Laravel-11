@extends('layouts.app')

@section('title', 'Admin - Daftar Proyek')

@section('content')
<div class="container mx-auto px-4 pt-24 pb-8">
    <!-- Header & Add Button -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-slate-100">Kelola Proyek</h1>
        <div class="space-x-4">
            <a href="{{ route('admin.skills.index') }}" class="text-slate-400 hover:text-slate-200 transition-colors">
                <i class="fas fa-star mr-1"></i> Kelola Keahlian
            </a>
            <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                <i class="fas fa-plus mr-2"></i> Tambah Proyek
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500 text-green-500 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-slate-900/60 rounded-2xl border border-slate-700/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-slate-300">
                <thead class="bg-slate-800/60 text-slate-100 uppercase text-sm font-semibold">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Gambar</th>
                        <th class="px-6 py-4">Nama Proyek</th>
                        <th class="px-6 py-4">Tahun</th>
                        <th class="px-6 py-4">Jenis</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($projects as $index => $project)
                    <tr class="hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            @if($project->gambar_path)
                                <img src="{{ asset($project->gambar_path) }}" alt="Img" class="w-16 h-10 object-cover rounded">
                            @else
                                <span class="text-slate-600 text-xs">No Image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-100">{{ $project->nama_proyek }}</td>
                        <td class="px-6 py-4">{{ $project->tahun_proyek }}</td>
                        <td class="px-6 py-4">{{ $project->jenis_proyek }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $project->status == 'Tampil' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                {{ $project->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('projects.show', $project->id) }}" class="text-blue-400 hover:text-blue-300" title="Lihat"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-yellow-400 hover:text-yellow-300" title="Edit"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus proyek ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300" title="Hapus"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-slate-500">
                            Belum ada data proyek.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
