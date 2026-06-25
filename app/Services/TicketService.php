<?php

namespace App\Services;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class TicketService
{
    public function generateQrCode(string $token): string
    {
        $qrCode = new QrCode($token);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $directory = storage_path('app/public/barcodes');
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $filePath = $directory . '/' . $token . '.png';
        $result->saveToFile($filePath);

        return 'storage/barcodes/' . $token . '.png';
    }
}
