<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KmlController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'kml_file' => 'required|file',
        ]);

        $xml = simplexml_load_file($request->file('kml_file'));
        if (!$xml) {
            return back()->with('error', 'Invalid KML format');
        }

        // $path = $request->file('kml_file')->store('kml','public');
        $uploadedFile = $request->file('kml_file');

        // Get the original file name without the extension
        $fileNameWithoutExtension = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);

        // Generate a new file name with the .kml extension
        $newFileName = $fileNameWithoutExtension . '.kml';

        // Store the file with the new file name
        $path = $uploadedFile->storeAs('kml', $newFileName);

        return redirect()->route('map.show',compact('path'));
    }

    public function showMap(Request $request)
    {
        $path = env('APP_URL')."/storage/{$request->path}";
        return view('kml.map',compact('path'));
    }

}
