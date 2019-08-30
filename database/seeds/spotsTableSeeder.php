<?php

use Illuminate\Database\Seeder;

class spotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = '/storage/json/test.json';
        $jsonString = file_get_contents(base_path($path));
        $content = json_decode($jsonString);
        foreach ($content as $key => $value) {
            if($value){
                $spots = new \App\spots([
                    'Id'=>$value->Id,
                    'Name'=>$value->Name,
                    'Zone'=>$value->Zone,
                    'Toldescribe'=>$value->Toldescribe,
                    'Description'=>$value->Description,
                    'Tel'=>$value->Tel,
                    'Add'=>$value->Add,
                    'Zipcode'=>$value->Zipcode,
                    'Travellinginfo'=>$value->Travellinginfo,
                    'Opentime'=>$value->Opentime,
                    'Picture1'=>$value->Picture1,
                    'Picdescribe1'=>$value->Picdescribe1,
                    'Picture2'=>$value->Picture2,
                    'Picdescribe2'=>$value->Picdescribe2,
                    'Picture3'=>$value->Picture3,
                    'Picdescribe3'=>$value->Picdescribe3,
                    'Map'=>$value->Map,
                    'Gov'=>$value->Gov,
                    'Px'=>$value->Px,
                    'Py'=>$value->Py,
                    'Orgclass'=>$value->Orgclass,
                    'Class1'=>$value->Class1,
                    'Class2'=>$value->Class2,
                    'Class3'=>$value->Class3,
                    'Level'=>$value->Level,
                    'Website'=>$value->Website,
                    'Parkinginfo'=>$value->Parkinginfo,
                    'Parkinginfo_Px'=>$value->Parkinginfo_Px,
                    'Parkinginfo_Py'=>$value->Parkinginfo_Py,
                    'Ticketinfo'=>$value->Ticketinfo,
                    'Remarks'=>$value->Remarks,
                    'Keyword'=>$value->Keyword,
                    'Changetime'=>$value->Changetime
                ]);
                $spots->save();
            }//end if 
        }//end foreach
        
    }//end run
}// end class
