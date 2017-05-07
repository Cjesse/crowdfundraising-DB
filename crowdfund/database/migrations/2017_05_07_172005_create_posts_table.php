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
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('uid')->unsigned();
            $table->integer('pid')->unsigned();
            $table->timestamps();
            $table->primary(['uid', 'pid']);

            $table->foreign('uid')->references('uid')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pid')->references('pid')->on('projects')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
