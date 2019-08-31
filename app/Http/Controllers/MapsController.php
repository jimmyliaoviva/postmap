<?php

namespace App\Http\Controllers;

use App\spots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class MapsController extends Controller
{
    public function getIndex(){
        $spots = spots::all();
        return view('maps.index',['spots'=>$spots]);
    }

public function getTest(){
    $path = '/storage/json/test.json';
    $jsonString = file_get_contents(base_path($path));
    $content = json_decode($jsonString, true);
    return response($content);
}
//this is not used!
public function getScenic(){
    $path = '/storage/json/scenic.json';
    $jsonString = file_get_contents(base_path($path));
    $content = json_decode($jsonString, true);
    return response($content);

}
//this is not used!
public function getJson(){
    $path = '/storage/json/scenic_spot.json';
    $jsonString = file_get_contents(base_path($path));
    $content = json_decode($jsonString, true);
    //$content = JSON.parse($jsonString);
    return response($content);

}
//this is the controller to post editing page!
public function getPostcard(){
    $spots = spots::all();
    return view('postcard.writecard',['spots'=>$spots]);

}
}
