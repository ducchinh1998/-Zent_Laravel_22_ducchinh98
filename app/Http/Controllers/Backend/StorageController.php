<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function save()
    // {

    // }

    public function dowload()
    {
        return Storage::download('file.jpg');
    }

    public function delete()
    {
        Storage::disk('public')->delete('path/file.jpg');
    }
}
