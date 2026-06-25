<x-app-layout>
    <div class="relative h-[60vh] md:h-[80vh] overflow-hidden -mt-20">
        <img src="{{ asset($film->banner) }}" class="w-full h-full object-cover" alt="{{ $film->nama_film }}">
        <div class="absolute inset-0 bg-gradient-to-t from-cinema-900 via-cinema-900/70 to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-32 relative z-10">
        <div class="md:flex gap-8">
            <div class="md:w-80 shrink-0" data-aos="fade-right">
                    <img src="{{ asset($film->poster) }}" class="w-full rounded-2xl shadow-2xl border border-cinema-600/30" alt="{{ $film->nama_film }}">
            </div>
            <div class="mt-6 md:mt-0 flex-1" data-aos="fade-left">
                <div class="flex flex-wrap items-center gap-2 text-xs mb-2">
                    <span class="badge-age bg-cinema-accent/20 text-cinema-accent-light">{{ $film->usia }}+</span>
                    <span class="text-gray-400">{{ $film->dimensi }}</span>
                </div>

                <h1 class="text-3xl md:text-4xl font-bold text-white font-display">{{ $film->nama_film }}</h1>

                <div class="flex flex-wrap items-center gap-4 mt-3 text-sm text-gray-400">
                    <span><i class="bi bi-collection me-1.5 text-cinema-accent"></i>{{ $film->genre }}</span>
                    <span><i class="bi bi-clock me-1.5 text-cinema-accent"></i>{{ $film->total_menit }} menit</span>
                    <span><i class="bi bi-star-fill me-1.5 text-cinema-gold"></i>4.5</span>
                </div>

                <p class="text-gray-300 mt-4 leading-relaxed">{{ $film->judul }}</p>

                <div class="grid grid-cols-2 gap-4 mt-6 text-sm">
                    <div><span class="text-gray-500">Producer</span><p class="text-gray-200">{{ $film->Producer }}</p></div>
                    <div><span class="text-gray-500">Director</span><p class="text-gray-200">{{ $film->Director }}</p></div>
                    <div><span class="text-gray-500">Writer</span><p class="text-gray-200">{{ $film->Writer }}</p></div>
                    <div><span class="text-gray-500">Distributor</span><p class="text-gray-200">{{ $film->Distributor }}</p></div>
                </div>

                <div class="mt-4 text-sm">
                    <span class="text-gray-500">Cast</span>
                    <p class="text-gray-300 mt-1">{{ $film->Cast }}</p>
                </div>

                <div class="flex items-center gap-4 mt-8">
                    <div class="text-2xl font-bold text-cinema-gold">
                        Rp {{ number_format($film->harga ?? 0, 0, ',', '.') }}
                        <span class="text-sm text-gray-400 font-normal">/ kursi</span>
                    </div>
                    @auth
                        <a href="{{ route('jadwal.index', $film->id) }}" class="btn-gold inline-flex items-center gap-2">
                            <i class="bi bi-ticket-perforated"></i> Beli Tiket
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary inline-flex items-center gap-2">
                            <i class="bi bi-box-arrow-in-right"></i> Login untuk Beli
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
