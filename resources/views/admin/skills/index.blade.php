@extends('layouts.app')

@section('title', 'Admin - Daftar Keahlian')

@section('content')
<div class="max-w-7xl mx-auto px-4 pt-24 pb-12">
    <!-- Admin Navigation / Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <div>
            <div class="flex items-center gap-3 text-sm text-slate-400 mb-2">
                <a href="{{ route('home') }}" class="hover:text-blue-400 transition-colors"><i class="fas fa-home"></i> Home</a>
                <span>/</span>
                <span class="text-slate-200">Admin Dashboard</span>
            </div>
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-blue-400">
                Kelola Keahlian
            </h1>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-xl border border-slate-700 transition-all">
                <i class="fas fa-project-diagram mr-2 text-blue-400"></i> Kelola Proyek
            </a>
            <a href="{{ route('admin.skills.create') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-all transform hover:scale-105">
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
                    <th class="px-6 py-4">Kategori</th>
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
                    <td class="px-6 py-4">
                        @php
                            $colors = [
                                'Programming Language' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                                'Web Development' => 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30',
                                'Mobile Development' => 'bg-violet-500/20 text-violet-400 border-violet-500/30',
                                'Database' => 'bg-amber-500/20 text-amber-400 border-amber-500/30',
                                'UI/UX Design' => 'bg-pink-500/20 text-pink-400 border-pink-500/30',
                                'Desain Grafis dan Multimedia' => 'bg-fuchsia-500/20 text-fuchsia-400 border-fuchsia-500/30',
                                'Jaringan' => 'bg-cyan-500/20 text-cyan-400 border-cyan-500/30',
                                'Data Analis' => 'bg-rose-500/20 text-rose-400 border-rose-500/30',
                            ];
                            $colorClass = $colors[$skill->kategori_23312240] ?? 'bg-slate-700 text-slate-300 border-slate-600';
                        @endphp
                        <span class="px-3 py-1 rounded-full text-xs font-medium border {{ $colorClass }}">
                            {{ $skill->kategori_23312240 }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-400 max-w-xs truncate">{{ $skill->deskripsi }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $skill->status == 'Tampil' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                            {{ $skill->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="{{ route('admin.skills.edit', $skill->id_keahlian) }}" class="text-yellow-400 hover:text-yellow-300" title="Edit"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.skills.destroy', $skill->id_keahlian) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus keahlian ini?');">
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
