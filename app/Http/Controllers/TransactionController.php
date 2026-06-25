<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Transaction;
use App\Services\DemoPaymentService;
use App\Services\TicketService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function processPayment(Request $request, DemoPaymentService $paymentService)
    {
        $result = $paymentService->process($request->all());

        return response()->json([
            'snap_token' => 'demo_token_' . $result['order_id'],
            'order_id' => $result['order_id'],
            'demo_result' => $result,
        ]);
    }

    public function saveTransaction(Request $request, TicketService $ticketService)
    {
        $orderId = $request->order_id;
        $transactionStatus = $request->transaction_status;
        $paymentType = $request->payment_type;
        $grossAmount = $request->gross_amount;
        $transactionTime = $request->transaction_time;
        $username = $request->username;
        $seatNumbers = $request->seat_number;
        $namaFilm = $request->film_name;

        Transaction::create([
            'order_id' => $orderId,
            'status' => $transactionStatus,
            'payment_type' => $paymentType,
            'amount' => $grossAmount,
            'transaction_time' => $transactionTime,
            'username' => $username,
            'seat_number' => $seatNumbers,
            'nama_film' => $namaFilm,
        ]);

        $seatArray = explode(',', $seatNumbers);
        Seat::whereIn('seat_number', $seatArray)
            ->update(['status' => 'occupied']);

        $qrPath = $ticketService->generateQrCode($orderId);

        return response()->json([
            'status' => 'success',
            'message' => 'Transaksi berhasil',
            'qr_path' => $qrPath,
            'order_id' => $orderId,
            'seat_number' => $seatNumbers,
            'film_name' => $namaFilm,
            'transaction_time' => $transactionTime,
            'payment_type' => $paymentType,
            'amount' => $grossAmount,
        ]);
    }

    public function history()
    {
        $transactions = Transaction::where('username', auth()->user()->email)
            ->orderByDesc('created_at')
            ->get();

        return view('transaction.history', compact('transactions'));
    }
}
