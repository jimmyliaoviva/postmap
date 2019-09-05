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
public function getPostcard($spotName){
    $spots = spots::all();
    $thisBox = spots::where('Name','=',$spotName)->first();
    return view('postcard.writecard',['spots'=>$spots, 'thisBox'=>$thisBox]);

}
/*
public function postPostcard(Request $request){
    $spots = spots::all();
    //$thisBox = spots::where('Name','==',$request->input('spotName'));
    $thisBox = spots::where('Name','=','秀峰瀑布')->first();
    return redirect()->route('postcard.writecard',['spots'=>$spots,'thisBox'=>$thisBox]);

}
*/
public function getMailbox(){
    //$spots = spots::all();  this need to be change to database of mail
    return view('postcard.mailbox');

}
public function getMycard(){
    //$spots = spots::all();  this need to be change to database of mail
    return view('postcard.mycard');

}
}