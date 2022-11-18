<?php

use App\Http\Controllers\DownloadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileUploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('file', [FileController::class, 'index'])->name('file');
Route::get('show/file', [FileController::class, 'showFile'])->name('show');
Route::post('upload', [FileController::class, 'upload'])->name('upload');
Route::get('download/{id}', [DownloadController::class, 'download']);


