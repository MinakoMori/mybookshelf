<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('author');
            $table->string('image_path')->nullable();
            $table->integer('money');
            $table->string('buy_date')->nullable();
            $table->string('status');
            $table->string('genre_friendship')->nullable();
            $table->string('genre_love')->nullable();
            $table->string('genre_action')->nullable();
            $table->string('genre_sf_horror')->nullable();
            $table->string('genre_mystery')->nullable();
            $table->string('genre_fantasy')->nullable();
            $table->string('genre_history')->nullable();
            $table->string('genre_nonfiction')->nullable();
            $table->string('genre_essay')->nullable();
            $table->string('genre_business')->nullable();
            $table->string('category')->nullable();
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
        Schema::dropIfExists('books');
    }
}
