@props(['skills'])

<section id="daftar-keahlian" class="glass-effect rounded-3xl p-8 md:p-12 mx-4 md:mx-8 my-8">
    <h2 class="text-2xl md:text-3xl font-bold text-slate-100 mb-8 pb-4 border-b border-slate-700 flex items-center gap-4">
        <i class="fas fa-star text-slate-500"></i>
        Daftar Keahlian
    </h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @if ($skills->count() > 0)
            @foreach ($skills as $skill)
                <div class="bg-slate-900/60 p-6 rounded-2xl border border-slate-700/50 text-center transition-all duration-400 hover:bg-slate-800/60 hover:border-slate-600 hover:-translate-y-2 hover:scale-105 hover:shadow-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-600/10 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-400"></div>
                    <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-slate-700/30 rounded-2xl transition-all duration-400 group-hover:bg-slate-600 group-hover:rotate-y-180 relative z-10">
                        @if (!empty($skill->icon_path) && file_exists(public_path($skill->icon_path)))
                            <img src="{{ asset($skill->icon_path) }}" alt="{{ $skill->nama_keahlian }}" class="w-8 h-8 object-contain">
                        @else
                            <i class="fas fa-code text-2xl text-slate-400"></i>
                        @endif
                    </div>
                    <div class="relative z-10">
                        <div class="text-lg font-semibold text-slate-100 mb-2">{{ $skill->nama_keahlian }}</div>
                        <div class="text-slate-400 text-sm">{{ $skill->deskripsi }}</div>
                    </div>
                </div>
            @endforeach
        @else
            <!-- Fallback skills jika tidak ada data -->
            <div class="bg-slate-900/60 p-6 rounded-2xl border border-slate-700/50 text-center transition-all duration-400 hover:bg-slate-800/60 hover:border-slate-600 hover:-translate-y-2 hover:scale-105 hover:shadow-2xl">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-slate-700/30 rounded-2xl">
                    <i class="fas fa-code text-2xl text-slate-400"></i>
                </div>
                <div class="text-lg font-semibold text-slate-100 mb-2">Web Development</div>
                <div class="text-slate-400 text-sm">HTML, CSS, JavaScript</div>
            </div>
            <div class="bg-slate-900/60 p-6 rounded-2xl border border-slate-700/50 text-center transition-all duration-400 hover:bg-slate-800/60 hover:border-slate-600 hover:-translate-y-2 hover:scale-105 hover:shadow-2xl">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-slate-700/30 rounded-2xl">
                    <i class="fas fa-palette text-2xl text-slate-400"></i>
                </div>
                <div class="text-lg font-semibold text-slate-100 mb-2">UI/UX Design</div>
                <div class="text-slate-400 text-sm">Figma, Adobe XD</div>
            </div>
        @endif
    </div>
</section>
