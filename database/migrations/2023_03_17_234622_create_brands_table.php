<?php

use App\Models\Brand;
use App\Models\Media;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Brand())->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('slug',256);
            $table->integer('characteristic_id');
            $table->boolean('popular')->default(0);
            $table->boolean('published')->default(1);
            $table->integer('ordering')->default(99999);
            $table->date('updated_at')->default(now());
            $table->date('created_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new Brand)->getTable());
    }
}
