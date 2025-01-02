<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        /**
         * Code to Store files on AWS.
         */
        // $image = $request->file('uploadedfile');
        // $fileName = 'uploaded' . '-' . Carbon::now()->format('d-m-Y');
        // $filePath = '/Images/' . $fileName;

        // Storage::disk('s3')->put($filePath, $image);

        // return redirect('/')->with('message', 'File uploded successfully!');

        /**
         * Code to store files Locally.
         */
        $image = $request->file('uploadedfile');
        $oringalName = $request->file('uploadedfile')->getClientOriginalName();
        $extension = $request->file('uploadedfile')->getClientOriginalExtension();
        $size = $request->file('uploadedfile')->getSize();
        $uploadTime = $request->file('uploadedfile')->getaTime();
        $fileDate = Carbon::now()->format('d-m-Y');
        $fileNameToStore = $oringalName . '_' . time() . '.' . $extension;
        $filePath = '/Images/';
        dd($image, time());

        Storage::disk('local')->put($filePath, $image);
        return redirect('/')->with('message', 'File uploded successfully!');
    }
}
