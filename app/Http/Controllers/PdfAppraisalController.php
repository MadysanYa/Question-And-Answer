<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\PropertyAppraisal;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfAppraisalController extends Controller
{
    public function index($id)
    {

        $appraisal = PropertyAppraisal::findOrFail($id);
        $qrImage = 'data:image/svg+xml;base64,' .  base64_encode(QrCode::geo($appraisal->latitude, $appraisal->longtitude));
    	
        $pdf = PDF::loadView('pdf/appraisal',
		[
            'appraisal' => $appraisal,
            'qrImage' => $qrImage,
    	]
	);
        return $pdf->stream($appraisal->property_reference . '.pdf');
    }
}