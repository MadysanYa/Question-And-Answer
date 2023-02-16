<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function index()
    {
        // QR code with text
        $data['qrcode'] = QrCode::generate('Welcome to Makitweb');

        // Store QR code for download
        QrCode::generate('Welcome to Makitweb', public_path('images/qrcode.svg') );
        return view('index',$data);
    }
}
