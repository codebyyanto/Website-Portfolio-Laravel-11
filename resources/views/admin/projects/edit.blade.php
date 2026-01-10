@extends('layouts.app')

@section('title', 'Admin - Edit Proyek')

@section('content')
<div class="container mx-auto px-4 pt-24 pb-8">
    <div class="max-w-3xl mx-auto">
        <a href="{{ route('admin.projects.index') }}" class="text-slate-400 hover:text-slate-200 mb-6 inline-block">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>

        <div class="bg-slate-900/60 rounded-3xl border border-slate-700/50 p-8">
            <h1 class="text-2xl font-bold text-slate-100 mb-6 pb-4 border-b border-slate-700">Edit Proyek: {{ $project->nama_proyek }}</h1>

            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500 text-red-500 px-4 py-3 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-400 mb-2">Nama Proyek</label>
                        <input type="text" name="nama_proyek" value="{{ old('nama_proyek', $project->nama_proyek) }}" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-slate-400 mb-2">Tahun Proyek</label>
                        <input type="number" name="tahun_proyek" value="{{ old('tahun_proyek', $project->tahun_proyek) }}" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-400 mb-2">Jenis Proyek</label>
                        <input type="text" name="jenis_proyek" value="{{ old('jenis_proyek', $project->jenis_proyek) }}" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-slate-400 mb-2">Durasi Pengerjaan</label>
                        <input type="text" name="durasi_pengerjaan" value="{{ old('durasi_pengerjaan', $project->durasi_pengerjaan) }}" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-400 mb-2">Tim Pengembang</label>
                    <textarea name="tim_pengembang" rows="2" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500">{{ old('tim_pengembang', $project->tim_pengembang) }}</textarea>
                </div>

                <div>
                    <label class="block text-slate-400 mb-2">Deskripsi Proyek</label>
                    <textarea name="deskripsi_proyek" rows="4" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500">{{ old('deskripsi_proyek', $project->deskripsi_proyek) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-400 mb-2">Gambar Proyek</label>
                        @if($project->gambar_path)
                            <div class="mb-2">
                                <img src="{{ asset($project->gambar_path) }}" alt="Current Image" class="h-20 rounded border border-slate-600">
                            </div>
                        @endif
                        <input type="file" name="gambar_proyek" accept="image/*" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                        <small class="text-slate-500 block mt-1">Upload untuk mengganti gambar.</small>
                    </div>
                    <div>
                        <label class="block text-slate-400 mb-2">Video Demo (Optional)</label>
                        @if($project->video_path)
                            <div class="mb-2 text-green-400 text-sm">
                                <i class="fas fa-check-circle"></i> Video teruplod
                            </div>
                        @endif
                        <input type="file" name="video_demo" accept="video/mp4,video/avi" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                        <small class="text-slate-500 block mt-1">Upload untuk mengganti video (Max 10MB).</small>
                    </div>
                </div>

                <div>
                    <label class="block text-slate-400 mb-2">Status</label>
                    <select name="status" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500">
                        <option value="Tampil" {{ old('status', $project->status) == 'Tampil' ? 'selected' : '' }}>Tampil</option>
                        <option value="Tidak Tampil" {{ old('status', $project->status) == 'Tidak Tampil' || old('status', $project->status) == 'Sembunyi' ? 'selected' : '' }}>Sembunyi / Tidak Tampil</option>
                    </select>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:scale-105 shadow-lg">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
