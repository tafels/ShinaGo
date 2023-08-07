<?php

use App\Models\Category;
use App\Models\CategoryContent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new CategoryContent())->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on((new Category())->getTable());
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
        Schema::dropIfExists((new CategoryContent())->getTable());
    }
}
