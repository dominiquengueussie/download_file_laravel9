<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;


class FileController extends Controller
{
    public function index()
    {
        return view('file-upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'file' => 'required|mimes:pdf,csv,xls,xlsx,doc,docx|max:4096',
        ], [
            'titre.required' => 'Veuillez entrer un titre du fichier',
            'file.required' => 'veuillez importer un fichier svp!',
        ]);

        $titre = $request->titre;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $name = time() . rand(1, 100) . '.' . $file->extension();
            if ($file->move(public_path('uploads'), $name)) {
                $files[] = $name;
                $result = File::create(["nom" => $name, "titre" => $titre]);
            }
        }

        if ($result) {
            return back()->with('success', 'Success! file uploaded');
        } else {
            return back()->with('failed', 'Alert! file not uploaded');
        }
    }

    public function showFile()
    {
        $fichiers = File::all();
        return view('file-upload', compact('fichiers'));
    }
}
