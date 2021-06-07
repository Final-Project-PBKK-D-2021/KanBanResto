<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;

class QRCodeController extends Controller
{
    public function index()
    {
        $barcode = 'barcode.png';
        $file = public_path($barcode);

        $qrCode = QRCode::text('Laravel QR Code Generator!')->setOutfile($file)->png();

        return view('KanBan::welcome', compact('barcode'));
    }
    
}
