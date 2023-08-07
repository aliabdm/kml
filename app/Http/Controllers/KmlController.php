<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $path = $request->file('kml_file')->store('kml','public');

        return redirect()->route('map.show',compact('path'));
    }

    public function showMap(Request $request)
    {
        $path = asset("storage/{$request->path}");
        return view('kml.map',compact('path'));
    }

}
