<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Topics', function (Blueprint $table) {
            $table->integer("id")->autoIncrement()->unsigned();
            $table->string('topicName', 100)->unique();
            $table->timestamps();
        });
        Schema::create('Blocks', function (Blueprint $table) {
            $table->id();
            $table->integer('topicId')->unsigned();
            $table->foreign('topicId')->references('id')->on('topics')->onDelete('cascade');
            $table->string('title', 100);
            $table->longtext('content')->nullable();
            $table->string('imagePath', 255)->nullable();
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
        Schema::dropIfExists('Blocks');
        Schema::dropIfExists('Topics');
    }
}
