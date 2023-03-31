<?php

use App\Models\Template;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Post)->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->json('params');
            $table->integer('template_id')->references('id')->on((new Template())->getTable());
            $table->boolean('published')->default(1);
            $table->date('updated_at');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new Post)->getTable());
    }
}
