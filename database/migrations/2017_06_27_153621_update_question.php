<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_question',function (Blueprint $table){
            $table->string('group_number')->comment('多语言标志字段');
            $table->string('lang')->comment('语言');
        });
         Schema::table('questionnaire',function (Blueprint $table){
            $table->string('lang')->comment('多语言标志字段');
        });
        Schema::table('questionnaire_question_item',function (Blueprint $table){
            $table->string('group_number')->comment('多语言标志字段');
            $table->string('lang')->comment('语言');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
