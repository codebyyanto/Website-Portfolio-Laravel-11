@extends('layouts.app')

@section('title', $project->nama_proyek . ' - Detail Proyek')

@section('content')
<div class="container mx-auto px-4 md:px-8 pt-24 pb-8">
    <div class="glass-effect rounded-3xl p-8 md:p-12 mx-auto max-w-4xl">
        <a href="{{ route('home') }}#riwayat-proyek" class="inline-flex items-center gap-2 text-slate-400 hover:text-slate-100 mb-6 transition-colors">
            <i class="fas fa-arrow-left"></i> Kembali ke Portfolio
        </a>

        <h1 class="text-3xl md:text-4xl font-bold text-slate-100 mb-6 border-b border-slate-700 pb-4">
            {{ $project->nama_proyek }}
        </h1>

        @if($project->gambar_path && file_exists(public_path($project->gambar_path)))
            <div class="mb-8 rounded-2xl overflow-hidden shadow-2xl border border-slate-700/50">
                <img src="{{ asset($project->gambar_path) }}" alt="{{ $project->nama_proyek }}" class="w-full h-auto object-cover max-h-[500px]">
            </div>
        @elseif($project->video_path)
             <!-- Placeholder for video if no image but video exists -->
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div>
                <h3 class="text-xl font-semibold text-slate-200 mb-4 flex items-center gap-2">
                    <i class="fas fa-info-circle text-slate-500"></i> Informasi Proyek
                </h3>
                <ul class="space-y-3 text-slate-300">
                    <li class="flex items-start gap-2">
                        <span class="text-slate-500 min-w-[120px]">Tahun Pengerjaan:</span>
                        <span class="font-medium">{{ $project->tahun_proyek }}</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-slate-500 min-w-[120px]">Jenis Proyek:</span>
                        <span class="font-medium">{{ $project->jenis_proyek }}</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-slate-500 min-w-[120px]">Durasi:</span>
                        <span class="font-medium">{{ $project->durasi_pengerjaan }}</span>
                    </li>
                </ul>
            </div>
            
            @if($project->tim_pengembang)
            <div>
                <h3 class="text-xl font-semibold text-slate-200 mb-4 flex items-center gap-2">
                    <i class="fas fa-users text-slate-500"></i> Tim Pengembang
                </h3>
                <div class="bg-slate-900/60 p-4 rounded-xl border border-slate-700/50">
                    <p class="text-slate-300">{{ $project->tim_pengembang }}</p>
                </div>
            </div>
            @endif
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-semibold text-slate-200 mb-4 flex items-center gap-2">
                <i class="fas fa-file-alt text-slate-500"></i> Deskripsi
            </h3>
            <div class="bg-slate-900/60 p-6 rounded-2xl border border-slate-700/50 text-slate-300 leading-relaxed whitespace-pre-wrap">
                {{ $project->deskripsi_proyek }}
            </div>
        </div>

        @if($project->video_path && file_exists(public_path($project->video_path)))
        <div>
            <h3 class="text-xl font-semibold text-slate-200 mb-4 flex items-center gap-2">
                <i class="fas fa-video text-slate-500"></i> Demo Video
            </h3>
            <div class="rounded-2xl overflow-hidden shadow-2xl border border-slate-700/50">
                <video controls class="w-full">
                    <source src="{{ asset($project->video_path) }}" type="video/mp4">
                    Browser anda tidak mendukung tag video.
                </video>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
