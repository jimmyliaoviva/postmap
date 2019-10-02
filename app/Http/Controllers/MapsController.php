<?php

namespace App\Http\Controllers;

use App\Card;
use App\spots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Auth;
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
    $path = 'http://localhost/storage/app/'.$path;
    $writer = Auth::user()->email;
    $card = \App\Card::create([
        'spotName'=>$request->input('spotName'),
        'content'=>$request->input('content'),
        'imgPath'=>$path,
        'writer'=>$writer
    ]);
    $card->save();
        //var_dump($request->file('input-b1'));
    return redirect()->route('maps.index');
    //return redirect()->route('maps.index');
}
//get card from postbox
public function getMailbox($spotName){
    $thisSpot = $spotName;
    //$spots = spots::all();  this need to be change to database of mail
    //$path = "{{ url('storage/app/img/OBuqnigbwXgUBOvqXn46T3cgyPKbLp5neR8RwRtG.png') }}";
    //$path = "http://localhost/storage/app/img/OBuqnigbwXgUBOvqXn46T3cgyPKbLp5neR8RwRtG.png";
    $card = Card::where([
        ['recieved','=','0'],
        ['spotName','=',$spotName],
        ['writer','<>',Auth::user()->email]
    ])->inRandomOrder()
    ->first();

        if ($card==null){
            $card = Card::where('id','=','2')
            ->first();
            //return view('postcard.card',['card'=>$card]);
        }//end if
        else{
            $card->recieved = '1';
            $card->reciever = Auth::user()->email;
            $card->save();
        }
        return view('postcard.card',['card'=>$card]);
}//end getMailbox

public function getMycard(){
    //$spots = spots::all();  this need to be change to database of mail
    //$cards = Card::where('writer','=',Auth::user()->email);
    $cards = Card::all();
    if($cards->count()==0){
        $cards = Card::where('id','=','2');
    }//end if

    return view('postcard.mycard',['cards'=>$cards]);

}//end getMycard

public function getCard($cardId){
    $card = Card::where('id','=',$cardId)->first();
    return view('postcard.card',['card'=>$card]);

}//end getCard
}
