<?php

use App\Models\Menu;
use App\Models\MenuLanguage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new MenuLanguage())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on((new Menu())->getTable());
            $table->string('title', 128)->nullable();
            $table->string('url', 256)->nullable();
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
        Schema::dropIfExists((new MenuLanguage())->getTable());
    }
}
