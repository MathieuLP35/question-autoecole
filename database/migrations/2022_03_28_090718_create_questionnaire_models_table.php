<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnaireModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire', function (Blueprint $table) {
            $table->id();
            $table->json('questions');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('groupe_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('groupe_id')->references('id')->on('groupes');
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
        Schema::dropIfExists('questionnaire');
    }
}
