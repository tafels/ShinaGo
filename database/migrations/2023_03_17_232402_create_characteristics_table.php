<?php

use App\Models\CategoryGroup;
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
            $table->string('slug', 256)->nullable();
            $table->string('short_name', 16)->nullable();
            $table->boolean('is_main')->default(0);
            $table->integer('group_id');
            $table->boolean('multiple')->default(0);
            $table->json('params');
            $table->integer('ordering_main')->default(0);
            $table->integer('ordering_slug')->default(0);
            $table->integer('ordering')->default(99999);
            $table->boolean('published')->default(1);
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
