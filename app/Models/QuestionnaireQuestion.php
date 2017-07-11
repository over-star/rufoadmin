<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireQuestion extends Model
{
    const TYPE_ONLY = 1;
    const TYPE_MULTIPLE = 2;
    const TYPE_WRITE = 3;

    protected $table='questionnaire_question';
    public function questionnaire_question_item(){
        return $this->hasMany(QuestionnaireQuestionItem::class, 'question_id', 'id');
    }
}
