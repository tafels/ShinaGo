<?php

use App\Models\Catalog;
use App\Models\CatalogContent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new CatalogContent())->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catalog_id')->unsigned();
            $table->foreign('catalog_id')->references('id')->on((new Catalog())->getTable());
            $table->string('title', 256)->nullable();
            $table->string('description', 256)->nullable();
            $table->string('slug',256);
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
        Schema::dropIfExists((new CatalogContent())->getTable());
    }
}
