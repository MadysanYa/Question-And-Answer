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

		// $data = [
        //     'imagePath'    => public_path('images/cambodia.png'),
        //     'name'         => 'John Doe',
        //     'address'      => 'USA',
        //     'mobileNumber' => '000000000',
        //     'email'        => 'john.doe@email.com'
        // ];
		//PDF::setOption([ 'isRemoteEnabled' => true]);
    	$pdf = PDF::loadView('pdf/appraisal',
		[
            'appraisal' => $appraisal,
            'qrImage' => $qrImage,
    		// 'title' => 'CodeAndDeploy.com Laravel Pdf Tutorial',
    		// 'description' => 'This is an example Laravel pdf tutorial.',
    		// 'footer' => 'by <a href="https://codeanddeploy.com">codeanddeploy.com</a>'
		    // 'imagePath'    => storage_path('app/public/images/cambodia.png'),
            // 'name'         => 'John Doe',
            // 'address'      => 'USA',
            // 'mobileNumber' => '000000000',
            // 'email'        => 'john.doe@email.com'
    	]
	);
		// $pdf.addImage(imgData, 'JPEG', 0, 0, width, height)
        return $pdf->download('appraisal.pdf');

		// $pdf = PDF::loadView('certificate', $data);
        // return $pdf->download('certificate.pdf');
    }
}