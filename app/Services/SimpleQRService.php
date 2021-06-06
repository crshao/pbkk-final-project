<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRService{
    public function generate($message)
    {
        return QrCode::generate($message);
    }
}