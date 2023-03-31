<?php

use App\Models\CatalogGroup;
use App\Models\Characteristic;
use App\Models\CharacteristicValue;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicsTable extends Migration
{
    public function up()
    {
        Schema::create((new Characteristic())->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('short_name', 16)->nullable();
            $table->string('slug', 256)->nullable();
            $table->boolean('is_main_filter')->default(0);
            $table->boolean('is_filter')->default(0);
            $table->integer('group_id');
            $table->string('type_input', 32);
            $table->json('params');
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
        Schema::dropIfExists((new Characteristic())->getTable());
    }
}
