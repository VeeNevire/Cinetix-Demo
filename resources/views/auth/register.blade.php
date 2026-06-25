<x-guest-layout>
    <form id="registerForm" method="POST" action="{{ route('register') }}">
        @csrf

        <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
            <i class="bi bi-person-plus text-cinema-accent"></i> Register
        </h2>

        <div id="step1">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="input-field" placeholder="Nama lengkap">
                @error('name')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="input-field" placeholder="email@example.com">
                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="input-field" placeholder="Min 8 karakter">
                @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="input-field" placeholder="Ulangi password">
            </div>

            <button type="button" onclick="sendOtp()" class="btn-primary w-full mt-6">
                <i class="bi bi-envelope-paper me-2"></i> Kirim OTP
            </button>

            <p class="text-center text-sm text-gray-500 mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-cinema-accent-light hover:text-cinema-accent transition font-medium">Login</a>
            </p>
        </div>

        <div id="step2" class="hidden">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-cinema-accent/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="bi bi-shield-lock text-cinema-accent text-2xl"></i>
                </div>
                <p class="text-sm text-gray-400">Kode OTP telah dikirim (demo):</p>
                <p id="otpDisplay" class="text-3xl font-bold tracking-[0.3em] text-cinema-accent my-3"></p>
            </div>

            <div>
                <label for="otp" class="block text-sm font-medium text-gray-300 mb-1 text-center">Masukkan Kode OTP</label>
                <input id="otp" type="text" name="otp" maxlength="6" required autocomplete="off"
                    class="input-field text-center text-2xl tracking-[0.3em]" placeholder="000000">
                @error('otp')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <input type="hidden" name="otp_verified" value="1">

            <button type="submit" class="btn-gold w-full mt-6">
                <i class="bi bi-check-lg me-2"></i> Daftar
            </button>
        </div>
    </form>

    @push('scripts')
    <script>
        @if(session('demo_otp'))
        Swal.fire({
            icon: 'info',
            title: 'Kode OTP Kamu',
            text: '{{ session('demo_otp') }}',
            confirmButtonText: 'Lanjutkan',
            confirmButtonColor: '#6c5ce7',
            background: '#1a1a2e',
            color: '#fff',
        }).then(() => {
            document.getElementById('step1').classList.add('hidden');
            document.getElementById('step2').classList.remove('hidden');
            document.getElementById('otpDisplay').textContent = '{{ session('demo_otp') }}';
        });
        @endif

        function sendOtp() {
            let name = document.getElementById('name').value.trim();
            let email = document.getElementById('email').value.trim();
            let password = document.getElementById('password').value;
            let passwordConf = document.getElementById('password_confirmation').value;

            if (!name || !email || !password || !passwordConf) {
                Swal.fire({
                    icon: 'warning', title: 'Lengkapi data',
                    text: 'Isi semua field terlebih dahulu.',
                    background: '#1a1a2e', color: '#fff',
                    confirmButtonColor: '#6c5ce7',
                });
                return;
            }
            if (password !== passwordConf) {
                Swal.fire({
                    icon: 'warning', title: 'Password tidak cocok',
                    text: 'Pastikan password dan konfirmasi sama.',
                    background: '#1a1a2e', color: '#fff',
                    confirmButtonColor: '#6c5ce7',
                });
                return;
            }

            document.getElementById('registerForm').submit();
        }
    </script>
    @endpush
</x-guest-layout>
