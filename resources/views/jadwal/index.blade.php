<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div data-aos="fade-up">
            <h1 class="text-2xl md:text-3xl font-bold text-white font-display">Pilih Jadwal</h1>
            <p class="text-gray-400 mt-1">{{ $film->nama_film }}</p>
        </div>

        @if($jadwals->isEmpty())
            <div class="glass rounded-2xl p-12 text-center mt-6">
                <i class="bi bi-calendar-x text-4xl text-gray-500"></i>
                <p class="text-gray-400 mt-3">Tidak ada jadwal tayang untuk film ini saat ini.</p>
            </div>
        @else
            <div class="space-y-4 mt-6">
                @foreach($jadwals as $jadwal)
                <div class="glass rounded-2xl p-5 flex flex-wrap items-center justify-between gap-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <div>
                        <h3 class="font-bold text-white flex items-center gap-2">
                            <i class="bi bi-building text-cinema-accent"></i>
                            {{ $jadwal->mall->nama_mall }}
                        </h3>
                        <div class="flex items-center gap-3 mt-1 text-sm text-gray-400">
                            <span><i class="bi bi-easel me-1"></i>{{ $jadwal->studio }}</span>
                            <span><i class="bi bi-calendar-week me-1"></i>{{ date('d M', strtotime($jadwal->tanggal_tayang)) }} - {{ date('d M', strtotime($jadwal->tanggal_akhir_tayang)) }}</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        @php $times = [$jadwal->jam_tayang_1, $jadwal->jam_tayang_2, $jadwal->jam_tayang_3]; @endphp
                        @foreach($times as $time)
                            @if($time)
                            <button class="pilih-jadwal btn-secondary text-sm py-2 px-4 flex items-center gap-1.5"
                                data-mall="{{ $jadwal->mall->nama_mall }}"
                                data-jam="{{ date('H:i', strtotime($time)) }}"
                                data-harga="{{ $film->harga }}"
                                data-film="{{ $film->nama_film }}"
                                data-studio="{{ $jadwal->studio }}">
                                <i class="bi bi-clock"></i>
                                {{ date('H:i', strtotime($time)) }}
                            </button>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Theater Modal --}}
    <div id="theaterModal" class="fixed inset-0 bg-cinema-950/90 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-cinema-800 border border-cinema-600/30 rounded-2xl shadow-2xl w-full max-w-3xl max-h-[90vh] overflow-y-auto p-6" data-aos="zoom-in">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="text-xl font-bold text-white" id="modalFilmName"></h3>
                    <p class="text-sm text-gray-400" id="modalInfo"></p>
                </div>
                <button onclick="closeTheater()" class="text-gray-400 hover:text-white text-2xl transition"><i class="bi bi-x-lg"></i></button>
            </div>

            <p class="text-cinema-gold font-semibold mb-4">Rp <span id="modalHarga"></span> / kursi</p>

            <div class="text-center mb-4">
                <div class="inline-block bg-gradient-to-r from-cinema-600 via-cinema-500 to-cinema-600 h-2 w-48 rounded-full"></div>
                <p class="text-xs text-gray-500 mt-1">LAYAR</p>
            </div>

            <div id="seatGrid" class="grid grid-cols-10 gap-1.5 max-w-lg mx-auto mb-6">
                @php $rows = range('A', 'H'); @endphp
                @foreach($rows as $row)
                    @for($i = 1; $i <= 10; $i++)
                    <button class="seat-btn seat-available rounded-lg text-xs py-2 transition" data-seat="{{ $row }}{{ $i }}">
                        {{ $row }}{{ $i }}
                    </button>
                    @endfor
                @endforeach
            </div>

            <div class="flex justify-center gap-6 text-xs text-gray-400 mb-4">
                <span class="flex items-center gap-1.5"><span class="w-4 h-4 rounded border border-cinema-500 bg-cinema-800"></span> Tersedia</span>
                <span class="flex items-center gap-1.5"><span class="w-4 h-4 rounded bg-cinema-accent"></span> Dipilih</span>
                <span class="flex items-center gap-1.5"><span class="w-4 h-4 rounded bg-red-600/40 border border-red-600/60"></span> Terisi</span>
            </div>

            <div class="border-t border-cinema-600/30 pt-4 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="text-sm text-gray-400">Kursi dipilih: <span id="selectedCount" class="font-bold text-white">0</span></p>
                    <p class="text-lg font-bold text-cinema-gold">Rp <span id="totalPrice">0</span></p>
                </div>
                <button id="bayarBtn" class="btn-gold disabled:opacity-40 disabled:cursor-not-allowed flex items-center gap-2" disabled>
                    <i class="bi bi-wallet2"></i> Bayar Sekarang
                </button>
            </div>
        </div>
    </div>

    {{-- Payment Modal --}}
    <div id="paymentModal" class="fixed inset-0 bg-cinema-950/90 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-cinema-800 border border-cinema-600/30 rounded-2xl shadow-2xl w-full max-w-md p-6" data-aos="zoom-in">
            <h3 class="text-lg font-bold text-white mb-1"><i class="bi bi-credit-card text-cinema-accent me-2"></i>Simulasi Pembayaran</h3>
            <p class="text-sm text-gray-400 mb-4">Pilih metode pembayaran:</p>
            <div class="space-y-2 mb-6">
                <label class="flex items-center gap-3 p-3 bg-cinema-700/50 border border-cinema-600 rounded-xl cursor-pointer hover:bg-cinema-700 transition has-[:checked]:border-cinema-accent has-[:checked]:bg-cinema-accent/10">
                    <input type="radio" name="payment_method" value="qris" class="accent-cinema-accent" checked>
                    <i class="bi bi-qr-code-scan text-cinema-accent text-xl"></i>
                    <span class="text-white text-sm">QRIS</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-cinema-700/50 border border-cinema-600 rounded-xl cursor-pointer hover:bg-cinema-700 transition has-[:checked]:border-cinema-accent has-[:checked]:bg-cinema-accent/10">
                    <input type="radio" name="payment_method" value="bank_transfer" class="accent-cinema-accent">
                    <i class="bi bi-bank text-cinema-accent text-xl"></i>
                    <span class="text-white text-sm">Bank Transfer</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-cinema-700/50 border border-cinema-600 rounded-xl cursor-pointer hover:bg-cinema-700 transition has-[:checked]:border-cinema-accent has-[:checked]:bg-cinema-accent/10">
                    <input type="radio" name="payment_method" value="convenience_store" class="accent-cinema-accent">
                    <i class="bi bi-shop text-cinema-accent text-xl"></i>
                    <span class="text-white text-sm">Convenience Store</span>
                </label>
            </div>
            <div class="flex gap-3">
                <button onclick="closePayment()" class="flex-1 btn-secondary">Batal</button>
                <button id="confirmPaymentBtn" class="flex-1 btn-gold"><i class="bi bi-check-lg me-1"></i>Bayar (Simulasi)</button>
            </div>
        </div>
    </div>

    {{-- Ticket Modal --}}
    <div id="ticketModal" class="fixed inset-0 bg-cinema-950/90 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-cinema-800 border border-cinema-600/30 rounded-2xl shadow-2xl w-full max-w-md p-6" data-aos="zoom-in">
            <div class="text-center mb-4">
                <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto">
                    <i class="bi bi-check-circle text-green-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mt-3">Pembayaran Berhasil!</h3>
                <p class="text-sm text-gray-400">E-Ticket kamu sudah siap</p>
            </div>
            <div class="bg-cinema-900/50 rounded-xl p-4 border border-cinema-600/30 text-sm space-y-1.5">
                <p class="flex justify-between"><span class="text-gray-400">Film</span><span class="text-white font-medium" id="tFilm"></span></p>
                <p class="flex justify-between"><span class="text-gray-400">Kursi</span><span class="text-cinema-accent font-bold" id="tSeat"></span></p>
                <p class="flex justify-between"><span class="text-gray-400">Order ID</span><span class="text-gray-300 text-xs font-mono" id="tOrder"></span></p>
                <p class="flex justify-between"><span class="text-gray-400">Waktu</span><span class="text-gray-300" id="tTime"></span></p>
                <p class="flex justify-between"><span class="text-gray-400">Metode</span><span class="text-gray-300" id="tPayment"></span></p>
                <p class="flex justify-between border-t border-cinema-600/30 pt-1.5"><span class="text-gray-400">Total</span><span class="text-cinema-gold font-bold">Rp <span id="tAmount"></span></span></p>
            </div>
            <div class="text-center mt-4">
                <img id="tQr" src="" alt="QR Code" class="inline-block w-36 h-36 bg-white rounded-xl p-2">
            </div>
            <button onclick="closeTicket()" class="btn-primary w-full mt-4"><i class="bi bi-check me-1"></i>Selesai</button>
        </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        let selectedSeats = new Set();
        let currentMall = '', currentFilm = '', currentHarga = 0, currentJam = '', currentStudio = '';
        let username = @js(auth()->user()->email ?? '');

        document.querySelectorAll('.pilih-jadwal').forEach(btn => {
            btn.addEventListener('click', function() {
                currentMall = this.dataset.mall;
                currentJam = this.dataset.jam;
                currentHarga = parseInt(this.dataset.harga);
                currentFilm = this.dataset.film;
                currentStudio = this.dataset.studio;
                document.getElementById('modalFilmName').textContent = currentFilm;
                document.getElementById('modalInfo').textContent = currentMall + ' — ' + currentStudio + ' — ' + currentJam;
                document.getElementById('modalHarga').textContent = currentHarga;
                selectedSeats.clear();
                updateSeatUI();
                fetchSeats(currentMall, currentFilm);
                document.getElementById('theaterModal').classList.remove('hidden');
            });
        });

        function fetchSeats(mall, film) {
            fetch(`/seats?mall_name=${encodeURIComponent(mall)}&film_name=${encodeURIComponent(film)}`)
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        document.querySelectorAll('.seat-btn').forEach(btn => {
                            let seat = btn.dataset.seat;
                            btn.className = 'seat-btn seat-available rounded-lg text-xs py-2 transition';
                            btn.disabled = false;
                            if (data.occupiedSeats.includes(seat)) {
                                btn.className = 'seat-btn seat-occupied rounded-lg text-xs py-2 transition';
                                btn.disabled = true;
                            }
                        });
                    }
                });
        }

        document.querySelectorAll('.seat-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (this.disabled) return;
                let seat = this.dataset.seat;
                if (selectedSeats.has(seat)) {
                    selectedSeats.delete(seat);
                    this.className = 'seat-btn seat-available rounded-lg text-xs py-2 transition';
                } else {
                    selectedSeats.add(seat);
                    this.className = 'seat-btn seat-selected rounded-lg text-xs py-2 transition';
                }
                updateSeatUI();
            });
        });

        function updateSeatUI() {
            let count = selectedSeats.size;
            document.getElementById('selectedCount').textContent = count;
            document.getElementById('totalPrice').textContent = count * currentHarga;
            document.getElementById('bayarBtn').disabled = count === 0;
        }

        document.getElementById('bayarBtn').addEventListener('click', () => document.getElementById('paymentModal').classList.remove('hidden'));

        document.getElementById('confirmPaymentBtn').addEventListener('click', function() {
            let paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            let totalPrice = parseInt(document.getElementById('totalPrice').textContent);
            let seatNumbers = Array.from(selectedSeats).join(',');

            Swal.fire({
                title: 'Memproses pembayaran...',
                html: '<div class="spinner"></div>',
                allowOutsideClick: false,
                background: '#1a1a2e',
                color: '#fff',
                didOpen: () => Swal.showLoading()
            });

            $.ajax({
                url: '/payment/process',
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: {
                    mall_name: currentMall, showtime: currentJam,
                    ticket_count: selectedSeats.size, total_price: totalPrice,
                    seat_number: seatNumbers, username: username,
                    payment_method: paymentMethod
                },
                success: function(resp) {
                    let demoResult = resp.demo_result;
                    $.ajax({
                        url: '/payment/save',
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        data: {
                            order_id: demoResult.order_id,
                            transaction_status: demoResult.status,
                            payment_type: demoResult.payment_type,
                            gross_amount: demoResult.gross_amount,
                            transaction_time: demoResult.transaction_time,
                            username: username, seat_number: seatNumbers,
                            film_name: currentFilm
                        },
                        success: function(saveResp) {
                            Swal.close();
                            document.getElementById('paymentModal').classList.add('hidden');
                            document.getElementById('theaterModal').classList.add('hidden');
                            document.getElementById('tFilm').textContent = currentFilm;
                            document.getElementById('tSeat').textContent = seatNumbers;
                            document.getElementById('tOrder').textContent = demoResult.order_id;
                            document.getElementById('tTime').textContent = demoResult.transaction_time;
                            document.getElementById('tPayment').textContent = paymentMethod;
                            document.getElementById('tAmount').textContent = totalPrice;
                            document.getElementById('tQr').src = '/' + saveResp.qr_path;
                            document.getElementById('ticketModal').classList.remove('hidden');
                        },
                        error: () => Swal.fire({ icon: 'error', title: 'Error', text: 'Gagal menyimpan transaksi', background: '#1a1a2e', color: '#fff', confirmButtonColor: '#6c5ce7' })
                    });
                },
                error: () => Swal.fire({ icon: 'error', title: 'Error', text: 'Gagal memproses pembayaran', background: '#1a1a2e', color: '#fff', confirmButtonColor: '#6c5ce7' })
            });
        });

        function closeTheater() { document.getElementById('theaterModal').classList.add('hidden'); }
        function closePayment() { document.getElementById('paymentModal').classList.add('hidden'); }
        function closeTicket() { document.getElementById('ticketModal').classList.add('hidden'); location.reload(); }
    </script>
    @endpush
</x-app-layout>
