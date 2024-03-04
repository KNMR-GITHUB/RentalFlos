<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class fileDisplay extends Controller
{
    public function hello($id){
        $file = str_replace('_','/',$id);
        echo $file;

        /// Retrieve the file from storage
        $file = Storage::disk('public')->path($id);

        // Check if the file exists
        if (!Storage::disk('public')->exists($id)) {
            abort(404);
        }

        // Determine the MIME type of the file
        $mimeType = Storage::disk('public')->mimeType($id);

        // Return the file as a response
        return response()->file($file, [
            'Content-Type' => $mimeType,
        ]);
    }
}
