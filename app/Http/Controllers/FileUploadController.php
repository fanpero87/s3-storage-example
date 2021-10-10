<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function store(Request $request) {

        $path = $request->file('uploadedfile')->store('fabioimage', 's3');

        return $path;
    }
}
