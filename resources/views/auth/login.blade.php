<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
            <i class="bi bi-box-arrow-in-right text-cinema-accent"></i> Login
        </h2>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="input-field" placeholder="demo@user.com">
            @error('email')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="input-field" placeholder="password">
            @error('password')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-4">
            <label class="flex items-center gap-2 text-sm text-gray-400">
                <input type="checkbox" name="remember" class="rounded bg-cinema-700 border-cinema-600 text-cinema-accent focus:ring-cinema-accent">
                Ingat saya
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-cinema-accent-light hover:text-cinema-accent transition">
                    Lupa password?
                </a>
            @endif
        </div>

        <button type="submit" class="btn-primary w-full mt-6">
            <i class="bi bi-box-arrow-in-right me-2"></i> Login
        </button>

        <p class="text-center text-sm text-gray-500 mt-4">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-cinema-accent-light hover:text-cinema-accent transition font-medium">Register</a>
        </p>

        <div class="mt-4 bg-cinema-700/50 rounded-xl p-3 text-xs text-gray-400">
            <p class="font-medium text-cinema-gold mb-1"><i class="bi bi-info-circle me-1"></i> Akun Demo:</p>
            <p>Email: <span class="text-white">demo@user.com</span> / Password: <span class="text-white">password</span></p>
        </div>
    </form>
</x-guest-layout>
