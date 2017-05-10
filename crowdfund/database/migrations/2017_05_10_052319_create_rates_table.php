<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level')->unsigned();
            $table->integer('user_uid')->unsigned();
            $table->integer('project_pid')->unsigned();
            $table->timestamps();
        });
        Schema::table('rates', function ($table){
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
        Schema::dropIfExists('rates');
    }
}