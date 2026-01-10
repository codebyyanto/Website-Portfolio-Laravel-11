@extends('layouts.app')

@section('title', 'Admin - Edit Keahlian')

@section('content')
<div class="container mx-auto px-4 pt-24 pb-8">
    <div class="max-w-2xl mx-auto">
        <a href="{{ route('admin.skills.index') }}" class="text-slate-400 hover:text-slate-200 mb-6 inline-block">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>

        <div class="bg-slate-900/60 rounded-3xl border border-slate-700/50 p-8">
            <h1 class="text-2xl font-bold text-slate-100 mb-6 pb-4 border-b border-slate-700">Edit Keahlian: {{ $skill->nama_keahlian }}</h1>

            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500 text-red-500 px-4 py-3 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-slate-400 mb-2">Nama Keahlian</label>
                    <input type="text" name="nama_keahlian" value="{{ old('nama_keahlian', $skill->nama_keahlian) }}" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-slate-400 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500">{{ old('deskripsi', $skill->deskripsi) }}</textarea>
                </div>

                <div>
                    <label class="block text-slate-400 mb-2">Icon (Optional)</label>
                    @if($skill->icon_path && file_exists(public_path($skill->icon_path)))
                        <div class="mb-2">
                            <img src="{{ asset($skill->icon_path) }}" alt="Current Icon" class="w-12 h-12 object-contain bg-slate-700 rounded p-1">
                        </div>
                    @endif
                    <input type="file" name="icon" accept="image/*" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 text-slate-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                    <small class="text-slate-500 block mt-1">Upload untuk mengganti icon.</small>
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
