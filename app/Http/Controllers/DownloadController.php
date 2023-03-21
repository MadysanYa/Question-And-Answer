<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * MAKE SURE YOUR FILE LOCATION ARE THE SAME. 
     * EXAMPLE: public/upload/default/ImportRegion.csv
     */
    public function downloadSampleCSV($file)
    {
        $path = public_path('upload/default/' . $file);

        if (file_exists($path)) {
            return response()->download($path);
        }
    }
}
