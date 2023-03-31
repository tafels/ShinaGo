<?php

use App\Models\Announcement;
use App\Models\AnnouncementContent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new AnnouncementContent())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('announcement_id')->constrained((new Announcement())->getTable());
            $table->string('title', 256);
            $table->string('description', 256);
            $table->string('path',512);
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
        Schema::dropIfExists((new AnnouncementContent())->getTable());
    }
}
