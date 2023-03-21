<?php

namespace App\Admin\Actions\Region;

use App\Models\Region;
use Illuminate\Http\Request;
use Encore\Admin\Actions\Action;
use Illuminate\Support\Facades\Storage;

class ImportRegion extends Action
{
    public $name = 'Import Region';
    protected $selector = '.import-region';

    public function handle(Request $request)
    {
        // $request ...
        $file = $request->file('csv_file');

        try {
            // Store the uploaded file temporarily on the server
            $path = Storage::putFile('temp', $file);
            // Open File
            $openFile = fopen(storage_path('app/' . $path), 'r');
            // Get File Header
            // $headers = fgetcsv($openFile);

            $csv = array_map('str_getcsv', file(storage_path('app/' . $path)));

            // Loop through each row in the CSV file and create a new Region model
            // while (($row = fgetcsv($openFile)) !== false) {
            //     $record = [];

            //     foreach ($headers as $index => $header) {
            //         $record[$header] = $row[$index];
            //     }

            //     DB::transaction(function () use ($record) {
            //         Region::create($record);
            //     });
            // }

            foreach ($csv as $key => $row) {
                $user = new Region();

                if ($key) {
                    $user->region_name = $row[0];
                    $user->save();
                }
            }

            // Delete the temporary file
            Storage::delete($path);

            return $this->response()->success('Regions imported successfully.')->refresh();
        } catch (\Exception $e) {
            return $this->response()->error('generating error: ' . $e->getMessage());
        }
    }

    public function form()
    {
        $this->file('csv_file', 'File (CSV)')->rules('required');
    }

    public function html()
    {
        $route = route('download.sample.csv', ['file' => 'ImportRegion.csv']);

        return <<<HTML
            <div class="dropdown pull-right column-selector" style="margin-left: 3px">
                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    Import Region &nbsp;<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li class="text-right">
                        <a href="$route" target="_blank" class="btn btn-sm btn-default download-region" style="margin-bottom: 3px">Download Sample</a>
                        <a class="btn btn-sm btn-default import-region">Upload File</a>
                    </li>
                </ul>
            </div>
        HTML;
    }

    public function html1()
    {
        return <<<HTML
                <a class="btn btn-sm btn-default import-region">Import Region</a>
                
            HTML;
    }
}
