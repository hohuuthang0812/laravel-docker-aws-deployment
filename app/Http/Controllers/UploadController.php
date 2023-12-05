<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $fileName = $request->file->getClientOriginalName();
        $filePath = 'uploads/' . $fileName;

        $path = Storage::disk('s3')->put($filePath, file_get_contents($request->file));
        $path = asset($filePath);
        return response()->json([
            'path' => $path,
            'msg' => 'success'
        ]);
    }
}
