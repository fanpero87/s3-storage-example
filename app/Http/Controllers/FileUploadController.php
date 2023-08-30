<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('uploadedfile');
        $fileName = 'uploaded' . '-' . Carbon::now()->format('d-m-Y');
        $filePath = '/Images/' . $fileName;

        Storage::disk('s3')->put($filePath, $image);

        return redirect('/')->with('message', 'File uploded successfully!');
        dd('message');
    }
}
