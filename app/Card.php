<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $fillable = [
        'spotName',
        'content',
        'imgPath',
        'recieved',
        'writer',
        'reciever'
    ];

}
