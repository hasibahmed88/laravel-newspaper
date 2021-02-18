<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->text('news_title');
            $table->text('news_short_description');
            $table->text('news_long_description');
            $table->tinyInteger('status');
            $table->string('news_image');
            $table->integer('total_view')->default(0);
            $table->integer('total_comment')->default(0);
            $table->tinyInteger('featured')->nullable()->default(0);
            $table->tinyInteger('trending')->nullable()->default(0);
            $table->text('tags')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
