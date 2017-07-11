<?php

namespace App\Services\Repositories;

use App\Models\Questionnaire;

class QuestionnaireRepository
{

    protected $questionnaire;

    /**
     * All of the option items  that is modified.
     *
     * @var array
     */
    public function __construct(Questionnaire $questionnaire)
    {
        $this->questionnaire = $questionnaire;
    }

    /***
     * 创建问卷
     * @param $attributeArray
     * @return bool
     */
    public function createQuestionnaire($attributeArray) {
        $this->questionnaire->title=$attributeArray->title;
        $this->questionnaire->description=$attributeArray->description;
        $this->questionnaire->author_id=$attributeArray->author_id;
        $this->questionnaire->lang=$attributeArray->lang;
        return $this->questionnaire->save();
    }

}
