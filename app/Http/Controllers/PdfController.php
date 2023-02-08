<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index()
    {

		// $data = [
        //     'imagePath'    => public_path('images/cambodia.png'),
        //     'name'         => 'John Doe',
        //     'address'      => 'USA',
        //     'mobileNumber' => '000000000',
        //     'email'        => 'john.doe@email.com'
        // ];
		//PDF::setOption([ 'isRemoteEnabled' => true]);
    	$pdf = PDF::loadView('certificate',
		[
    		// 'title' => 'CodeAndDeploy.com Laravel Pdf Tutorial',
    		// 'description' => 'This is an example Laravel pdf tutorial.',
    		// 'footer' => 'by <a href="https://codeanddeploy.com">codeanddeploy.com</a>'
		    'imagePath'    => storage_path('app/public/images/cambodia.png'),
            'name'         => 'John Doe',
            'address'      => 'USA',
            'mobileNumber' => '000000000',
            'email'        => 'john.doe@email.com'
    	]
	);
		// $pdf.addImage(imgData, 'JPEG', 0, 0, width, height)
        return $pdf->download('certificate.pdf');

		// $pdf = PDF::loadView('certificate', $data);
        // return $pdf->download('certificate.pdf');
    }
}