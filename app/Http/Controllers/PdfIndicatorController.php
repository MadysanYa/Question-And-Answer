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
        $qrImage = 'data:image/svg+xml;base64,' .  base64_encode(QrCode::geo($indicator->latitude, $indicator->longtitude));
        
    	$pdf = PDF::loadView('pdf/indicator',
		[
            'indicator' => $indicator,
            'qrImage' => $qrImage
    	]
	);
        return $pdf->download('indicator.pdf');
    }
}