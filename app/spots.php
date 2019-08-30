<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spots extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'Id',
    'Name',
    'Zone',
    'Toldescribe',
    'Description',
    'Tel',
    'Add',
    'Zipcode',
    'Travellinginfo',
    'Opentime',
    'Picture1',
    'Picdescribe1',
    'Picture2',
    'Picdescribe2',
    'Picture3',
    'Picdescribe3',
    'Map',
    'Gov',
    'Px',
    'Py',
    'Orgclass',
    'Class1',
    'Class2',
    'Class3',
    'Level',
    'Website',
    'Parkinginfo',
    'Parkinginfo_Px',
    'Parkinginfo_Py',
    'Ticketinfo',
    'Remarks',
    'Keyword',
    'Changetime'];
}
