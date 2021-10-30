<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($name, $ext)
    {
        $name = $name . '.' . $ext;
        $imagedir = $_SERVER['DOCUMENT_ROOT'] . '/files/images/' . $name;
        header('Content-type: image/' . $ext . '');
        header("Content-Length: " . filesize($imagedir));
        ob_clean();
        flush();
        return file_get_contents($imagedir);
    }
}
