<?php

namespace App\Services;

class OtpService
{
    public function generate(): string
    {
        return str_pad((string) rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}
