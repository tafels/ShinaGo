<?php

use App\Models\Characteristic;
use App\Models\CharacteristicValue;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new CharacteristicValue())->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('characteristic_id')->unsigned();
            $table->foreign('characteristic_id')->references('id')->on((new Characteristic())->getTable());
            $table->boolean('popular')->default(0);
            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(99999);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new CharacteristicValue())->getTable());
    }
}
