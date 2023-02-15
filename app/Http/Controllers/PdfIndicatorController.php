<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\PropertyIndicator;

class PdfIndicatorController extends Controller
{
    public function index($id)
    {
        $indicator = PropertyIndicator::findOrFail($id);

        // $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));

        // dd($indicator);
    	$pdf = PDF::loadView('pdf/indicator',
		[
            'indicator' => $indicator,
		    // 'imagePath'    => storage_path('app/public/images/cambodia.png'),
    	]
	);
		// $pdf.addImage(imgData, 'JPEG', 0, 0, width, height)
        return $pdf->download('indicator.pdf');
		// $pdf = PDF::loadView('certificate', $data);
    }
}