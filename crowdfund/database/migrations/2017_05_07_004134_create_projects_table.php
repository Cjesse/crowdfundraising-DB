<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('pid');
            $table->string('pname', 45);
            $table->text('description')->nullable();
            $table->binary('sample')->nullable();
            $table->string('category', 45);
            $table->dateTime('enddate');
            $table->dateTime('deadline');
            $table->decimal('minfund', 10, 2)->default('0');
            $table->decimal('maxfund', 10, 2);
            $table->decimal('currentfund', 10, 2);
            $table->boolean('issuccess')->default('0');
            $table->boolean('iscomplete')->default('0');
            $table->boolean('isreleased')->default('0');
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
        Schema::dropIfExists('projects');
    }
}
