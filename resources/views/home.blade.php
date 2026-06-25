<x-app-layout>
    {{-- Hero Carousel --}}
    @if($films->count())
    <div class="relative h-[60vh] md:h-[75vh] overflow-hidden" data-aos="fade">
        <div x-data="{ current: 0, timer: null }" x-init="timer = setInterval(() => { current = (current + 1) % {{ $films->count() }} }, 5000)" class="h-full">
            <template x-for="(film, index) in @js($films)" :key="index">
                <div x-show="current === index"
     x-transition:enter="transition ease-out duration-700"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-500"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="absolute inset-0">
                    <img :src="'/' + film.poster" class="block md:hidden w-full h-full object-cover">
                    <img :src="'/' + film.banner" class="hidden md:block w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-cinema-900 via-cinema-900/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-8 md:p-16">
                        <h2 class="text-2xl md:text-5xl font-bold text-white mb-2 font-display" x-text="film.nama_film"></h2>
                        <div class="flex items-center gap-3 text-sm text-gray-300 mb-4">
                            <span class="badge-age bg-cinema-accent/20 text-cinema-accent-light" x-text="film.usia + '+'"></span>
                            <span x-text="film.genre"></span>
                            <span><i class="bi bi-clock me-1"></i><span x-text="film.total_menit"></span> menit</span>
                        </div>
                        <a :href="`/film/${film.id}`" class="btn-gold inline-flex items-center gap-2">
                            <i class="bi bi-ticket-perforated"></i> Beli Tiket
                        </a>
                    </div>
                </div>
            </template>
            <button @click="current = current > 0 ? current - 1 : {{ $films->count() - 1 }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white p-3 rounded-full transition">
                <i class="bi bi-chevron-left text-xl"></i>
            </button>
            <button @click="current = current < {{ $films->count() - 1 }} ? current + 1 : 0" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white p-3 rounded-full transition">
                <i class="bi bi-chevron-right text-xl"></i>
            </button>
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                <template x-for="(film, index) in @js($films)" :key="'dot-' + index">
                    <button @click="current = index" :class="current === index ? 'bg-cinema-accent w-6' : 'bg-white/40 w-2'" class="h-2 rounded-full transition-all duration-300"></button>
                </template>
            </div>
        </div>
    </div>
    @endif

    {{-- Top 10 --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-10" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 bg-cinema-accent/10 text-cinema-accent-light px-4 py-1.5 rounded-full text-sm font-semibold">
                <i class="bi bi-fire"></i> Now Playing
            </span>
            <h1 class="text-3xl md:text-4xl font-bold text-white mt-3 font-display">TOP 10 Film Teratas</h1>
            <p class="text-gray-400 mt-2">Film paling populer berdasarkan jumlah transaksi</p>
        </div>

        @if($topFilms->isEmpty())
            <p class="text-center text-gray-500 py-12">Belum ada data film.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($topFilms as $rank => $film)
                <div class="card-movie group" data-aos="fade-up" data-aos-delay="{{ $rank * 80 }}">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset($film->poster) }}" class="card-img" alt="{{ $film->nama_film }}">
                        <div class="absolute top-3 left-3 bg-cinema-accent text-white w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm shadow-lg">
                            #{{ $rank + 1 }}
                        </div>
                        <div class="absolute inset-0 bg-cinema-900/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <a href="{{ route('film.show', $film->id) }}" class="btn-primary text-sm">
                                <i class="bi bi-eye me-1.5"></i> Detail
                            </a>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-white truncate">{{ $film->nama_film }}</h3>
                        <div class="flex items-center justify-between mt-2">
                            <span class="badge-age bg-cinema-600 text-gray-300">{{ $film->usia }}+</span>
                            <span class="text-cinema-gold text-sm font-semibold"><i class="bi bi-star-fill me-1"></i>4.{{ $rank + 1 }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
