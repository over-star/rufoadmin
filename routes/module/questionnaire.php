<?php
use Illuminate\Support\Facades\Route;

    Route::group(['middleware' => 'admin.user','namespace' => 'Module'], function (){
//      Route::resource('admin/questionnaire/index', ['uses' => 'QuestionnaireController@Index']);
        Route::resource('questionnaire', 'QuestionnaireController');
    });


Route::group(['middleware' => 'admin.user','namespace' => 'Module'], function (){
    //根据语言预览试卷
    Route::get('questionnaire/preview/{questionnaire_id}/{lang}', 'QuestionnaireController@preview');
    Route::resource('questionnaire', 'QuestionnaireController');
    //试题管理
    Route::get('questionnaire/question/{questionnaire_id}', 'QuestionnaireQuestionController@index');
    //添加试题页面
    Route::get('questionnaire/question/create/{questionnaire_id}', 'QuestionnaireQuestionController@create');
    //添加试题
    Route::post('questionnaire/question/store/{questionnaire_id}', 'QuestionnaireQuestionController@store');
    //修改试题页面
    Route::get('questionnaire/question/edit/{group_number}', 'QuestionnaireQuestionController@edit');
    //修改试题
    Route::post('questionnaire/question/update/{group_number}', 'QuestionnaireQuestionController@update');
    //删除试题
    Route::delete('questionnaire/question/delete/{questionnaire_id}/{group_number}', 'QuestionnaireQuestionController@delete');


});