<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $table='questionnaire';
    //将属性转换为常见的数据类型的方法
    protected $casts = [
        'lang' => 'array',
    ];

    public function questionnaireQuestion(){
        return $this->hasMany(QuestionnaireQuestion::class,'questionnaire_id','id');
    }
}
