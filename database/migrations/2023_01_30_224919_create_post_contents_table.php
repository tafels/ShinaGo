<?php

use App\Models\Post;
use App\Models\PostContent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new PostContent())->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on((new Post())->getTable());
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
        Schema::dropIfExists((new PostContent())->getTable());
    }
}
