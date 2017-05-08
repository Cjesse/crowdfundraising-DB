<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pledges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_uid')->unsigned();
            $table->integer('project_pid')->unsigned();
            $table->float('amount',10,2)->unsigned();
            $table->string('CCN');
            $table->tinyInteger('charged');

            $table->timestamps();
        });

        Schema::table('pledges', function ($table){
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
        Schema::dropForeign(['user_id', 'project_pid']);
        Schema::dropIfExists('pledges');
    }
}
