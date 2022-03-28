<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionGroupeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_groupe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_question');
            $table->unsignedBigInteger('id_groupe');
            $table->timestamps();
            $table->foreign('id_question')->references('id')->on('questions');
            $table->foreign('id_groupe')->references('id')->on('groupes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_groupe_models');
    }
}
