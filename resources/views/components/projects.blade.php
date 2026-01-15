@props(['projects'])

<section id="riwayat-proyek" class="glass-effect rounded-3xl p-8 md:p-12 mx-4 md:mx-8 my-8">
    <h2 class="text-2xl md:text-3xl font-bold text-slate-100 mb-8 pb-4 border-b border-slate-700 flex items-center gap-4">
        <i class="fas fa-project-diagram text-slate-500"></i>
        Riwayat Proyek
    </h2>
    
    @if ($projects->count() > 0)
        @foreach ($projects as $project)
            <div class="bg-slate-900/60 p-6 rounded-2xl border border-slate-700/50 mb-6 border-l-4 border-slate-600 transition-all duration-300 hover:bg-slate-800/60 hover:border-slate-600 hover:translate-x-4 hover:border-l-6 hover:shadow-2xl">
                <h3 class="text-xl font-semibold text-slate-100 mb-3">{{ $project->nama_proyek }}</h3>
                <p class="text-slate-400 mb-4">
                    <strong class="text-slate-300">Tahun:</strong> {{ $project->tahun_proyek }} | 
                    <strong class="text-slate-300">Jenis:</strong> {{ $project->jenis_proyek }} | 
                    <strong class="text-slate-300">Durasi:</strong> {{ $project->durasi_pengerjaan }}
                </p>
                
                <div class="text-slate-400 mb-4 max-h-[4.5em] overflow-hidden relative">
                    {{ $project->deskripsi_proyek }}
                    <div class="absolute bottom-0 right-0 w-1/3 h-6 bg-gradient-to-l from-slate-900/60 to-transparent"></div>
                </div>
                
                @if (!empty($project->tim_pengembang))
                    <p class="text-slate-400 mb-4"><strong class="text-slate-300">Tim:</strong> {{ $project->tim_pengembang }}</p>
                @endif
                <p class="text-slate-500">
                    <a href="{{ route('projects.show', $project->id_proyek) }}" class="text-slate-400 hover:text-slate-200 transition-colors duration-300">
                        <i class="fas fa-external-link-alt mr-2"></i> Detail Proyek &gt;&gt;
                    </a>
                </p>
            </div>
        @endforeach
    @else
        <div class="bg-slate-900/60 p-12 rounded-2xl border border-slate-700/50 text-center">
            <i class="fas fa-inbox text-5xl text-slate-500 mb-4"></i>
            <p class="text-slate-400 text-lg mb-2">Tidak ada data proyek yang ditampilkan.</p>
            <small class="text-slate-500">Admin dapat menambahkan proyek.</small>
        </div>
    @endif
</section>
