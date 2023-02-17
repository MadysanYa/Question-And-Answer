<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\PropertyIndicator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfIndicatorController extends Controller
{
    public function index($id)
    {
        $indicator = PropertyIndicator::findOrFail($id);

        // $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));

        // dd($indicator);
        //QrCode::phoneNumber('555-555-5555');
        // $qrImage = 'data:image/svg+xml;base64,' .  $this->svgUrlEncode(QrCode::generate('Welcome to Makitweb'));
        $qrImage = 'data:image/svg+xml;base64,' .  base64_encode(QrCode::geo($indicator->latitude, $indicator->longtitude));
        //QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9');
    	$pdf = PDF::loadView('pdf/indicator',
		[
            'indicator' => $indicator,
            'qrImage' => $qrImage
		    // 'imagePath'    => storage_path('app/public/images/cambodia.png'),
    	]
	);

    // echo ">>>>>>>";
    // print_r($qrImage); return;
		// $pdf.addImage(imgData, 'JPEG', 0, 0, width, height)
        return $pdf->download('indicator.pdf');
		// $pdf = PDF::loadView('certificate', $data);
    }


    function svgUrlEncode($svgPath) {
        $data = \file_get_contents($svgPath);
        $data = \preg_replace('/\v(?:[\v\h]+)/', ' ', $data);
        $data = \str_replace('"', "'", $data);
        $data = \rawurlencode($data);
        // re-decode a few characters understood by browsers to improve compression
        $data = \str_replace('%20', ' ', $data);
        $data = \str_replace('%3D', '=', $data);
        $data = \str_replace('%3A', ':', $data);
        $data = \str_replace('%2F', '/', $data);
        return $data;
    }
}