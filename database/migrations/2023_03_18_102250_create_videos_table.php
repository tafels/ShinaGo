<?php

use App\Models\Media;
use App\Models\Video;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Video())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->integer('media_id')->unsigned();
            $table->foreign('media_id')->references('id')->on((new Media())->getTable());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new Video())->getTable());
    }
}
