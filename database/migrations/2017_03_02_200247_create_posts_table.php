<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function(Blueprint $table){

        $table->increments('id');
        $table->string('title')->unique();
        $table->text('body');
        $table->text('excerpt');
        $table->string('image')->nullable();
        $table->string('slug')->unique();
        $table->boolean('active');
        $table->integer('category')->unsigned();
        $table->index('category');
        $table->foreign('category')->references('id')->on('post_category')->onDelete('restrict');
        $table->integer('user_id')->unsigned();
        $table->index('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::drop('posts');
    }
}
