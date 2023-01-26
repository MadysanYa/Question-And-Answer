<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index() 
    {
		// $path = base_path('cambodia.png');
		// $type = pathinfo($path, PATHINFO_EXTENSION);
		// $data = file_get_contents($path);
		// $pic = 'data:image/' . $type . ';base64' . base64_encode($data);

    	$pdf = PDF::loadView('certificate', [
    		'title' => 'CodeAndDeploy.com Laravel Pdf Tutorial',
    		'description' => 'This is an example Laravel pdf tutorial.',
    		'footer' => 'by <a href="https://codeanddeploy.com">codeanddeploy.com</a>'
    	]);
    
        return $pdf->download('certificate.pdf');
    }
}