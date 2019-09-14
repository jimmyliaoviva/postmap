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

public function postPostcard(Request $request){
    //var_dump($request->all());

        $path = $request->file('input-b1')->store('img');
        //var_dump($request->file('input-b1'));
    return $path;
    //return redirect()->route('maps.index');
}

public function getMailbox($spotName){
    $thisSpot = $spotName;
    //$spots = spots::all();  this need to be change to database of mail
    //$path = "{{ url('storage/app/img/OBuqnigbwXgUBOvqXn46T3cgyPKbLp5neR8RwRtG.png') }}";
    $path = "http://localhost/storage/app/img/OBuqnigbwXgUBOvqXn46T3cgyPKbLp5neR8RwRtG.png";
    return view('postcard.mailbox',['spotName'=>$thisSpot,'path'=>$path]);

}
public function getMycard(){
    //$spots = spots::all();  this need to be change to database of mail
    return view('postcard.mycard');

}
}
