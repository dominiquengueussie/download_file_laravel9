<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DownloadController extends Controller
{
    public function download($id)
    {
        $cv_uploads = DB::table('files')->where('id', $id)->first();
        $pathToFile = public_path("uploads/{$cv_uploads->nom}");
        return \Response::download($pathToFile);
    }
}
