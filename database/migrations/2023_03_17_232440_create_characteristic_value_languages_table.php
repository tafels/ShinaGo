<?php

use App\Models\CharacteristicValue;
use App\Models\CharacteristicValueLanguage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicValueLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new CharacteristicValueLanguage())->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('characteristic_value_id')->unsigned();
            $table->foreign('characteristic_value_id','parent_id')->references('id')->on((new CharacteristicValue())->getTable());
            $table->string('name', 256)->nullable();
            $table->string('slug', 256)->nullable();
            $table->string('language',5)->default('*');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new CharacteristicValueLanguage())->getTable());
    }
}
