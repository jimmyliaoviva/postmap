<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class MapsController extends Controller
{
    //
    public function getJson(){
        $path = 'storage/json/scenic_spot.json';
        $jsonString = file_get_contents(base_path($path));

        $content = json_decode($jsonString, true);
        dd($content);

}

}
