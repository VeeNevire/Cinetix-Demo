<?php

namespace App\Services;

class DemoPaymentService
{
    public function process(array $data): array
    {
        $orderId = 'DEMO-' . strtoupper(substr(md5(uniqid()), 0, 8));

        return [
            'status' => 'settlement',
            'payment_type' => $data['payment_method'] ?? 'qris',
            'transaction_time' => now()->toDateTimeString(),
            'gross_amount' => $data['total_price'],
            'order_id' => $orderId,
        ];
    }
}
