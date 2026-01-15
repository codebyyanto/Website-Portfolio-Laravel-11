@extends('layouts.app')

@section('title', 'Admin - Tambah Keahlian')

@section('content')
<div class="container mx-auto px-4 pt-24 pb-8">
    <div class="max-w-2xl mx-auto">
        <a href="{{ route('admin.skills.index') }}" class="text-slate-400 hover:text-slate-200 mb-6 inline-block">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>

        <div class="bg-slate-900/60 rounded-3xl border border-slate-700/50 p-8">
            <h1 class="text-2xl font-bold text-slate-100 mb-6 pb-4 border-b border-slate-700">Tambah Keahlian Baru</h1>



            <form action="{{ route('admin.skills.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-slate-400 mb-2">Nama Keahlian</label>
                    <input type="text" name="nama_keahlian" value="{{ old('nama_keahlian') }}" class="w-full bg-slate-800 border @error('nama_keahlian') border-red-500 @else border-slate-600 @enderror rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500" required>
                    @error('nama_keahlian')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-slate-400 mb-2">Kategori</label>
                    <select name="kategori_23312240" class="w-full bg-slate-800 border @error('kategori_23312240') border-red-500 @else border-slate-600 
                    @enderror rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach(['Programming Language', 'Web Development', 
                        'Mobile Development', 'Database', 'UI/UX Design',
                        'Desain Grafis dan Multimedia', 'Jaringan', 'Data Analis'] as $kategori)
                            <option value="{{ $kategori }}" {{ old('kategori_23312240') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori_23312240')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-slate-400 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full bg-slate-800 border @error('deskripsi') border-red-500 @else border-slate-600 @enderror rounded-lg px-4 py-2 text-slate-200 focus:outline-none focus:border-blue-500">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-slate-400 mb-2">Icon (Optional)</label>
                    <input type="file" name="icon" accept="image/*" class="w-full bg-slate-800 border @error('icon') border-red-500 @else border-slate-600 @enderror rounded-lg px-4 py-2 text-slate-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                    <small class="text-slate-500 block mt-1">Format: JPG, PNG, SVG. Max: 2MB.</small>
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:scale-105 shadow-lg">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
