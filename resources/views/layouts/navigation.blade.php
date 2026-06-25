<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">
                        🎬 CineTix Demo
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        Home
                    </x-nav-link>
                    <x-nav-link href="{{ route('genre.index', ['genre' => 'Action']) }}" :active="request()->routeIs('genre.*')">
                        Genre
                    </x-nav-link>
                    <x-nav-link href="{{ route('usia.index', ['usia' => 'SU']) }}" :active="request()->routeIs('usia.*')">
                        Usia
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <a href="{{ route('riwayat') }}" class="text-sm text-gray-700 hover:text-indigo-600 me-4">
                        Riwayat
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-700 hover:text-indigo-600">
                            Logout ({{ auth()->user()->name }})
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-indigo-600 me-4">Login</a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-indigo-600">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
