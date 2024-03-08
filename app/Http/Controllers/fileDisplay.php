<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class fileDisplay extends Controller
{
    public function downloadFile($propId, $fileName)
    {
        $hello = str_replace('_', '/', $fileName);

        $name = explode('file/',$hello);
        $down = 'public/'.$hello;
        if (Storage::disk('public')->exists($hello)) {

            $headers = [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ];

            return Storage::download($down, $name[1] , $headers);
        } else {

            abort(404, 'File not found');
        }
    }
}
