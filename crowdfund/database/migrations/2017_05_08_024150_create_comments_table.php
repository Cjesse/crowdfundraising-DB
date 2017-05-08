<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('user_uid')->unsigned();
            $table->integer('project_pid')->unsigned();
            $table->timestamps();
            $table->text('content');
        });
        Schema::table('comments', function ($table){
            $table->foreign('user_uid')->references('uid')->on('users')->onDelete('cascade');
            $table->foreign('project_pid')->references('pid')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['user_id', 'project_id']);
        Schema::dropIfExists('comments');
    }
}
