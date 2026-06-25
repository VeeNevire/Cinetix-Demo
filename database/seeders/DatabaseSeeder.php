<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\JadwalFilm;
use App\Models\Mall;
use App\Models\Seat;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'User Demo',
            'email' => 'demo@user.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'User Kedua',
            'email' => 'user2@demo.com',
            'password' => bcrypt('password'),
        ]);

        $cinere = Mall::create(['nama_mall' => 'CINERE', 'email' => '', 'password' => '']);
        $cinereBellevue = Mall::create(['nama_mall' => 'CINERE BELLEVUE XXI', 'email' => '', 'password' => '']);
        $depok = Mall::create(['nama_mall' => 'DEPOK XXI', 'email' => '', 'password' => '']);
        $margo = Mall::create(['nama_mall' => 'MARGO CITY XXI', 'email' => '', 'password' => '']);
        $pesona = Mall::create(['nama_mall' => 'PESONA SQUARE XXI', 'email' => '', 'password' => '']);
        $park = Mall::create(['nama_mall' => 'THE PARK SAWANGAN XXI', 'email' => '', 'password' => '']);
        $tsm = Mall::create(['nama_mall' => 'TSM XXI CIBUBUR', 'email' => '', 'password' => '']);

        $paddington = Film::create([
            'poster' => 'uploads/poster/paddington2.jpg',
            'banner' => 'uploads/banner/film2.jpg',
            'trailer' => 'uploads/trailer/173528896843522.mp4',
            'nama_film' => 'Paddington in Peru',
            'judul' => 'Paddington kembali ke Peru untuk mengunjungi Bibi Lucy tercintanya. Bersama keluarga Brown, petualangan tak terduga terjadi saat sebuah misteri membawa mereka ke perjalanan tak terlupakan.',
            'total_menit' => '106',
            'usia' => 'SU',
            'genre' => 'Family, Comedy, Adventure',
            'dimensi' => '2D',
            'Producer' => 'Rosie Alison',
            'Director' => 'Dougal Wilson',
            'Writer' => 'Mark Burton, Jon Foster, James Lamont',
            'Cast' => 'Ben Whishaw, Imelda Staunton, Antonio Banderas, Oliver Maltman, Joel Fry, Robbie Gee, Sanjeev Bhaskar, Ben Miller, Jessica Hynes, Madeleine Harris, Emily Mortimer, Hugh Bonneville, Samuel Joslin, Hayl',
            'Distributor' => 'Sony Pictures',
            'harga' => '10',
        ]);

        $kakak = Film::create([
            'poster' => 'uploads/poster/pos1kakak.jpg',
            'banner' => 'uploads/banner/film4.jpg',
            'trailer' => 'uploads/trailer/173624013657939.mp4',
            'nama_film' => '1 KAKAK 7 PONAKAN',
            'judul' => 'Setelah kematian mendadak kakak-kakaknya, Hendarmoko (Chicco Kurniawan) seorang arsitek muda yang sedang berjuang, tiba-tiba menjadi orangtua tunggal bagi keponakan-keponakannya.',
            'total_menit' => '131',
            'usia' => 'SU',
            'genre' => 'Drama',
            'dimensi' => '2D',
            'Producer' => 'Lachman G. Samtani, Suryana Paramita, Manoj K. Samtani, Deepak G. Samtani',
            'Director' => 'Yandy Laurens',
            'Writer' => 'Yandy Laurens',
            'Cast' => 'Chicco Kurniawan, Amanda Rawles, Fatih Unru, Freya Jkt48, Nadif H.s., Kawai Labiba, Ringgo Agus Rahman, Niken Anjani, Kiki Narendra, Maudy Koesnaedi',
            'Distributor' => 'Mandela Picture, Cerita Films, Legacy Pictures',
            'harga' => '5',
        ]);

        JadwalFilm::create([
            'mall_id' => $cinere->id,
            'film_id' => $paddington->id,
            'studio' => 'Studio 1',
            'jam_tayang_1' => '09:56:00',
            'jam_tayang_2' => '10:56:00',
            'jam_tayang_3' => '00:56:00',
            'tanggal_tayang' => '2025-01-25',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '106',
        ]);

        JadwalFilm::create([
            'mall_id' => $depok->id,
            'film_id' => $paddington->id,
            'studio' => 'Studio 1',
            'jam_tayang_1' => '11:23:00',
            'jam_tayang_2' => '13:23:00',
            'jam_tayang_3' => '16:23:00',
            'tanggal_tayang' => '2025-01-01',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '106',
        ]);

        JadwalFilm::create([
            'mall_id' => $margo->id,
            'film_id' => $paddington->id,
            'studio' => 'Studio 1',
            'jam_tayang_1' => '11:38:00',
            'jam_tayang_2' => '14:38:00',
            'jam_tayang_3' => '17:38:00',
            'tanggal_tayang' => '2025-01-01',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '106',
        ]);

        JadwalFilm::create([
            'mall_id' => $park->id,
            'film_id' => $kakak->id,
            'studio' => 'Studio 2',
            'jam_tayang_1' => '20:10:00',
            'jam_tayang_2' => '13:11:00',
            'jam_tayang_3' => '08:11:00',
            'tanggal_tayang' => '2025-02-02',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '131',
        ]);

        // Paddington → CINERE BELLEVUE
        JadwalFilm::create([
            'mall_id' => $cinereBellevue->id,
            'film_id' => $paddington->id,
            'studio' => 'Studio 1',
            'jam_tayang_1' => '10:00:00',
            'jam_tayang_2' => '13:00:00',
            'jam_tayang_3' => '16:00:00',
            'tanggal_tayang' => '2025-01-01',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '106',
        ]);

        // Paddington → PESONA SQUARE
        JadwalFilm::create([
            'mall_id' => $pesona->id,
            'film_id' => $paddington->id,
            'studio' => 'Studio 1',
            'jam_tayang_1' => '11:30:00',
            'jam_tayang_2' => '14:30:00',
            'jam_tayang_3' => '17:30:00',
            'tanggal_tayang' => '2025-01-01',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '106',
        ]);

        // Paddington → THE PARK SAWANGAN
        JadwalFilm::create([
            'mall_id' => $park->id,
            'film_id' => $paddington->id,
            'studio' => 'Studio 1',
            'jam_tayang_1' => '09:00:00',
            'jam_tayang_2' => '12:00:00',
            'jam_tayang_3' => '15:00:00',
            'tanggal_tayang' => '2025-01-01',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '106',
        ]);

        // Paddington → TSM CIBUBUR
        JadwalFilm::create([
            'mall_id' => $tsm->id,
            'film_id' => $paddington->id,
            'studio' => 'Studio 1',
            'jam_tayang_1' => '10:30:00',
            'jam_tayang_2' => '13:30:00',
            'jam_tayang_3' => '16:30:00',
            'tanggal_tayang' => '2025-01-01',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '106',
        ]);

        // 1 KAKAK 7 PONAKAN → CINERE
        JadwalFilm::create([
            'mall_id' => $cinere->id,
            'film_id' => $kakak->id,
            'studio' => 'Studio 2',
            'jam_tayang_1' => '11:00:00',
            'jam_tayang_2' => '14:00:00',
            'jam_tayang_3' => '17:00:00',
            'tanggal_tayang' => '2025-01-01',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '131',
        ]);

        // 1 KAKAK 7 PONAKAN → CINERE BELLEVUE
        JadwalFilm::create([
            'mall_id' => $cinereBellevue->id,
            'film_id' => $kakak->id,
            'studio' => 'Studio 2',
            'jam_tayang_1' => '10:00:00',
            'jam_tayang_2' => '13:00:00',
            'jam_tayang_3' => '16:00:00',
            'tanggal_tayang' => '2025-01-01',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '131',
        ]);

        // 1 KAKAK 7 PONAKAN → DEPOK
        JadwalFilm::create([
            'mall_id' => $depok->id,
            'film_id' => $kakak->id,
            'studio' => 'Studio 2',
            'jam_tayang_1' => '12:00:00',
            'jam_tayang_2' => '15:00:00',
            'jam_tayang_3' => '18:00:00',
            'tanggal_tayang' => '2025-01-01',
            'tanggal_akhir_tayang' => '2027-12-31',
            'total_menit' => '131',
        ]);

        $rows = range('A', 'H');
        $occupiedPark = ['A1', 'A2', 'A3', 'A4', 'A10', 'B1', 'B2', 'B3', 'C2', 'C3', 'C4', 'D5', 'D6', 'D7', 'B6', 'B7', 'B8', 'B9', 'B10', 'C6', 'C7', 'C8', 'C9', 'C10', 'F4', 'F5', 'F6', 'E5', 'E6', 'E7', 'D8', 'D9', 'D10', 'A5', 'A6', 'B5', 'C5', 'A8', 'A9', 'F8', 'F9', 'G6', 'G7', 'A7', 'B4', 'C1', 'D1', 'D2', 'D3', 'D4', 'E1', 'E2', 'E3', 'E4', 'F1', 'F2', 'F3', 'F7', 'G1', 'G2', 'G3', 'G4', 'G5', 'G8', 'G9', 'G10', 'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'H7', 'H8', 'H9', 'H10'];

        foreach ($rows as $row) {
            for ($i = 1; $i <= 10; $i++) {
                $seatNum = $row . $i;
                Seat::create([
                    'mall_name' => 'THE PARK SAWANGAN XXI',
                    'seat_number' => $seatNum,
                    'status' => in_array($seatNum, $occupiedPark) ? 'occupied' : 'available',
                    'film_name' => '1 KAKAK 7 PONAKAN',
                ]);
            }
        }

        $occupiedMargo = ['A3', 'A7', 'A6', 'G4', 'A2', 'A1', 'A4', 'F3', 'B7', 'C3', 'D4', 'D2', 'G8', 'A5', 'F9', 'D3', 'F5', 'B4', 'H4', 'H5', 'H10', 'B5', 'C6', 'H6', 'C2', 'G6', 'H7', 'G2', 'C7', 'D7', 'A8', 'A9', 'A10', 'D5', 'D6', 'D8', 'D9', 'D10', 'E6', 'E7', 'E8', 'B8', 'B9', 'B10', 'B6', 'C4', 'C5', 'E4', 'E5', 'C8', 'C9', 'E9', 'E10', 'F4', 'F6', 'G9', 'G10', 'C10'];

        foreach ($rows as $row) {
            for ($i = 1; $i <= 10; $i++) {
                $seatNum = $row . $i;
                Seat::create([
                    'mall_name' => 'MARGO CITY XXI',
                    'seat_number' => $seatNum,
                    'status' => in_array($seatNum, $occupiedMargo) ? 'occupied' : 'available',
                    'film_name' => 'Paddington in Peru',
                ]);
            }
        }

        // Seats — CINERE BELLEVUE + Paddington
        $occupiedBellevuePad = ['A1', 'A2', 'A3', 'B4', 'B5', 'C6', 'C7'];
        foreach ($rows as $row) {
            for ($i = 1; $i <= 10; $i++) {
                $seatNum = $row . $i;
                Seat::create([
                    'mall_name' => 'CINERE BELLEVUE XXI',
                    'seat_number' => $seatNum,
                    'status' => in_array($seatNum, $occupiedBellevuePad) ? 'occupied' : 'available',
                    'film_name' => 'Paddington in Peru',
                ]);
            }
        }

        // Seats — PESONA SQUARE + Paddington
        $occupiedPesonaPad = ['B1', 'B2', 'C3', 'C4', 'D5', 'D6'];
        foreach ($rows as $row) {
            for ($i = 1; $i <= 10; $i++) {
                $seatNum = $row . $i;
                Seat::create([
                    'mall_name' => 'PESONA SQUARE XXI',
                    'seat_number' => $seatNum,
                    'status' => in_array($seatNum, $occupiedPesonaPad) ? 'occupied' : 'available',
                    'film_name' => 'Paddington in Peru',
                ]);
            }
        }

        // Seats — THE PARK SAWANGAN + Paddington
        $occupiedParkPad = ['A2', 'A3', 'B4', 'B5', 'C1', 'C2', 'D3', 'D4'];
        foreach ($rows as $row) {
            for ($i = 1; $i <= 10; $i++) {
                $seatNum = $row . $i;
                Seat::create([
                    'mall_name' => 'THE PARK SAWANGAN XXI',
                    'seat_number' => $seatNum,
                    'status' => in_array($seatNum, $occupiedParkPad) ? 'occupied' : 'available',
                    'film_name' => 'Paddington in Peru',
                ]);
            }
        }

        // Seats — TSM CIBUBUR + Paddington
        $occupiedTsmPad = ['A1', 'B2', 'C3', 'D4', 'E5'];
        foreach ($rows as $row) {
            for ($i = 1; $i <= 10; $i++) {
                $seatNum = $row . $i;
                Seat::create([
                    'mall_name' => 'TSM XXI CIBUBUR',
                    'seat_number' => $seatNum,
                    'status' => in_array($seatNum, $occupiedTsmPad) ? 'occupied' : 'available',
                    'film_name' => 'Paddington in Peru',
                ]);
            }
        }

        // Seats — CINERE + 1 KAKAK
        $occupiedCinereKakak = ['A1', 'A2', 'B3', 'B4', 'C5', 'C6'];
        foreach ($rows as $row) {
            for ($i = 1; $i <= 10; $i++) {
                $seatNum = $row . $i;
                Seat::create([
                    'mall_name' => 'CINERE',
                    'seat_number' => $seatNum,
                    'status' => in_array($seatNum, $occupiedCinereKakak) ? 'occupied' : 'available',
                    'film_name' => '1 KAKAK 7 PONAKAN',
                ]);
            }
        }

        // Seats — CINERE BELLEVUE + 1 KAKAK
        $occupiedBellevueKakak = ['B1', 'B2', 'C3', 'C4', 'D5'];
        foreach ($rows as $row) {
            for ($i = 1; $i <= 10; $i++) {
                $seatNum = $row . $i;
                Seat::create([
                    'mall_name' => 'CINERE BELLEVUE XXI',
                    'seat_number' => $seatNum,
                    'status' => in_array($seatNum, $occupiedBellevueKakak) ? 'occupied' : 'available',
                    'film_name' => '1 KAKAK 7 PONAKAN',
                ]);
            }
        }

        // Seats — DEPOK + 1 KAKAK
        $occupiedDepokKakak = ['A1', 'A2', 'A3', 'B1', 'B2', 'B3', 'C1', 'C2'];
        foreach ($rows as $row) {
            for ($i = 1; $i <= 10; $i++) {
                $seatNum = $row . $i;
                Seat::create([
                    'mall_name' => 'DEPOK XXI',
                    'seat_number' => $seatNum,
                    'status' => in_array($seatNum, $occupiedDepokKakak) ? 'occupied' : 'available',
                    'film_name' => '1 KAKAK 7 PONAKAN',
                ]);
            }
        }

        Transaction::create([
            'order_id' => 'TIX-1738516335',
            'status' => 'settlement',
            'payment_type' => 'qris',
            'amount' => 10,
            'transaction_time' => '2025-02-03 00:12:13',
            'username' => 'demo@user.com',
            'seat_number' => 'D3',
            'nama_film' => 'Paddington in Peru',
        ]);

        Transaction::create([
            'order_id' => 'TIX-1739966881',
            'status' => 'settlement',
            'payment_type' => 'qris',
            'amount' => 15,
            'transaction_time' => '2025-02-19 19:08:05',
            'username' => 'demo@user.com',
            'seat_number' => 'D5,D6,D7',
            'nama_film' => '1 KAKAK 7 PONAKAN',
        ]);
    }
}
