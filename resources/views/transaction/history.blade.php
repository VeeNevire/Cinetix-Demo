<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div data-aos="fade-up">
            <h1 class="text-2xl md:text-3xl font-bold text-white font-display flex items-center gap-3">
                <i class="bi bi-clock-history text-cinema-accent"></i> Riwayat Transaksi
            </h1>
        </div>

        <div class="mt-6">
            @if($transactions->isEmpty())
                <div class="glass rounded-2xl p-12 text-center" data-aos="fade-up">
                    <i class="bi bi-inbox text-4xl text-gray-600"></i>
                    <p class="text-gray-400 mt-3">Belum ada transaksi. Yuk pesan ticket sekarang!</p>
                    <a href="{{ route('home') }}" class="btn-primary inline-flex items-center gap-2 mt-4">
                        <i class="bi bi-film"></i> Lihat Film
                    </a>
                </div>
            @else
                <div class="glass rounded-2xl overflow-hidden" data-aos="fade-up">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-cinema-600/30">
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Order ID</th>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Film</th>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Kursi</th>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Total</th>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium">Status</th>
                                    <th class="px-4 py-3 text-left text-gray-400 font-medium hidden md:table-cell">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-cinema-600/20">
                                @foreach($transactions as $trx)
                                <tr class="hover:bg-cinema-700/30 transition">
                                    <td class="px-4 py-3 font-mono text-xs text-gray-300">{{ $trx->order_id }}</td>
                                    <td class="px-4 py-3 text-white">{{ $trx->nama_film }}</td>
                                    <td class="px-4 py-3 text-cinema-accent font-medium">{{ $trx->seat_number }}</td>
                                    <td class="px-4 py-3 text-cinema-gold font-semibold">Rp {{ number_format($trx->amount, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">
                                        @if($trx->status === 'settlement')
                                            <span class="inline-flex items-center gap-1 bg-green-500/10 text-green-400 px-2.5 py-1 rounded-full text-xs font-medium">
                                                <i class="bi bi-check-circle"></i> Lunas
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 bg-yellow-500/10 text-yellow-400 px-2.5 py-1 rounded-full text-xs font-medium">
                                                <i class="bi bi-clock"></i> Menunggu
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-gray-400 text-xs hidden md:table-cell">{{ date('d M Y H:i', strtotime($trx->transaction_time)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
