<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div data-aos="fade-up">
            <span class="inline-flex items-center gap-2 bg-cinema-accent/10 text-cinema-accent-light px-3 py-1 rounded-full text-xs font-semibold">
                <i class="bi bi-tags"></i> Filter
            </span>
            <h1 class="text-2xl md:text-3xl font-bold text-white mt-2 font-display">Jelajahi Genre</h1>
        </div>

        <div class="flex flex-wrap gap-2 mt-6" data-aos="fade-up">
            @php $genres = ['Action', 'Comedy', 'Drama', 'Family', 'Adventure', 'Horror']; @endphp
            @foreach($genres as $g)
                <a href="{{ route('genre.index', ['genre' => $g]) }}" class="px-4 py-2 rounded-full text-sm transition {{ $genre === $g ? 'bg-cinema-accent text-white shadow-lg shadow-cinema-accent/30' : 'bg-cinema-700/50 text-gray-300 hover:bg-cinema-600 hover:text-white border border-cinema-600/30' }}">
                    {{ $g }}
                </a>
            @endforeach
            <a href="{{ route('genre.index', ['genre' => '']) }}" class="px-4 py-2 rounded-full text-sm bg-cinema-700/50 text-gray-300 hover:bg-cinema-600 hover:text-white border border-cinema-600/30 transition">Semua</a>
        </div>

        @if($films->isEmpty())
            <div class="text-center py-16" data-aos="fade-up">
                <i class="bi bi-search text-4xl text-gray-600"></i>
                <p class="text-gray-500 mt-3">Tidak ada film dengan genre "{{ $genre }}"</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-6">
                @foreach($films as $film)
                <div class="card-movie group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset($film->poster) }}" class="card-img" alt="{{ $film->nama_film }}">
                        <div class="absolute inset-0 bg-cinema-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <a href="{{ route('film.show', $film->id) }}" class="btn-primary text-sm"><i class="bi bi-eye me-1.5"></i>Detail</a>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-white truncate">{{ $film->nama_film }}</h3>
                        <div class="flex items-center gap-2 mt-2 text-xs text-gray-400">
                            <span class="badge-age bg-cinema-600 text-gray-300">{{ $film->usia }}+</span>
                            <span>{{ $film->genre }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
