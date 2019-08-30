<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->string('Id');
            $table->string('Name');
            $table->string('Zone');
            $table->text('Toldescribe');
            $table->text('Description');
            $table->string('Tel');
            $table->text('Add');
            $table->string('Zipcode');
            $table->text('Travellinginfo');
            $table->string('Opentime');
            $table->string('Picture1');
            $table->string('Picdescribe1');
            $table->string('Picture2');
            $table->string('Picdescribe2');
            $table->string('Picture3');
            $table->string('Picdescribe3');
            $table->string('Map');
            $table->string('Gov');
            $table->float('Px');
            $table->float('Py');
            $table->string('Orgclass');
            $table->string('Class1');
            $table->string('Class2');
            $table->string('Class3');
            $table->string('Level');
            $table->string('Website');
            $table->string('Parkinginfo');
            $table->float('Parkinginfo_Px');
            $table->float('Parkinginfo_Py');
            $table->text('Ticketinfo');
            $table->text('Remarks');
            $table->string('Keyword');
            $table->string('Changetime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spots');
    }
}
