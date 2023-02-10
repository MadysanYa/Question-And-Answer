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

        // dd($indicator);
    	$pdf = PDF::loadView('pdf/indicator',
		[
            'indicator' => $indicator,
            // 'test' = $indicator;
    		// 'title' => 'CodeAndDeploy.com Laravel Pdf Tutorial',
    		// 'description' => 'This is an example Laravel pdf tutorial.',
    		// 'footer' => 'by <a href="https://codeanddeploy.com">codeanddeploy.com</a>',
		    // 'imagePath'    => storage_path('app/public/images/cambodia.png'),
            // 'name'         => 'John Doe',
            // 'address'      => 'USA',
            // 'mobileNumber' => '000000000',
            // 'email'        => 'john.doe@email.com'
    	]
	);
		// $pdf.addImage(imgData, 'JPEG', 0, 0, width, height)
        return $pdf->download('indicator.pdf');

		// $pdf = PDF::loadView('certificate', $data);
        // return $pdf->download('certificate.pdf');
    }
}