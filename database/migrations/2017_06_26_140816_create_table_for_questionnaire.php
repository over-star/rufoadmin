<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForQuestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('questionnaire');

        Schema::create('questionnaire', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->defalut('');
            $table->integer('author_id');
            $table->timestamps();
            $table->index('author_id');
        });

        Schema::dropIfExists('questionnaire_question');

        Schema::create('questionnaire_question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionnaire_id');
            $table->string('title')->defalut('');
            $table->string('description')->defalut('');
            $table->integer('score')->default(0);
            $table->integer('type')->default(1)->comment('1单选题，2多选题，3填空题');
            $table->timestamps();
            $table->index('questionnaire_id');

        });
        Schema::dropIfExists('questionnaire_question_item');

        Schema::create('questionnaire_question_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->string('mark')->defalut('')->comment('ABCD等标识');
            $table->string('title')->defalut('')->comment('选项标题');
            $table->tinyInteger('right_key')->defalut(0)->comment('是否是正确答案，1是正确答案');
            $table->string('addition')->defalut('')->comment('附加条件');
            $table->timestamps();
            $table->index('question_id');

        });
        Schema::dropIfExists('questionnaire_user_answer');

        Schema::create('questionnaire_user_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionnaire_id');
            $table->integer('question_id');
            $table->string('answer')->defalut('');
            $table->timestamps();
            $table->index('questionnaire_id');
            $table->index('question_id');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questionnaire');
        Schema::drop('questionnaire_question');
        Schema::drop('questionnaire_question_item');
        Schema::drop('questionnaire_user_answer');
    }
}
