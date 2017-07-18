<?php

namespace App\Http\Controllers\Module;

use App\Models\Questionnaire;
use App\Models\QuestionnaireQuestion;
use App\Models\QuestionnaireQuestionItem;
use App\Services\Repositories\QuestionnaireRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class QuestionnaireQuestionController extends BaseController
{
    protected $questionnaireRepository;

    /**
     * All of the option items  that is modified.
     *
     * @var array
     */
    public function __construct(QuestionnaireRepository $questionnaireRepository)
    {
        $this->questionnaireRepository = $questionnaireRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $questionnaire_id
     * @return \Illuminate\Http\Response
     */
    public function index($questionnaire_id)
    {
        $all=QuestionnaireQuestion::query()->where('questionnaire_id',$questionnaire_id)
            ->groupBy('group_number')
//            ->select(DB::raw('ANY_VALUE(questionnaire_id) as questionnaire_id,ANY_VALUE(title) title,ANY_VALUE(description) ,ANY_VALUE(type),
//            ANY_VALUE(score) score,ANY_VALUE(lang) lang,
//            ANY_VALUE(created_at),ANY_VALUE(updated_at),
//            ANY_VALUE(id) id,group_number'))
            ->paginate(15);

        //dd($all->items());
        return view('admin.questionnaire.question.index',compact('all','questionnaire_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($questionnaire_id)
    {
        $questionnaire=Questionnaire::query()->where('id',$questionnaire_id)->first();
        return view('admin.questionnaire.question.create',compact('questionnaire','questionnaire_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|\Illuminate\Http\Request $request
     * @return bool
     */
    public function store($questionnaire_id,Request $request)
    {
        $group_number=Uuid::uuid1();
        $all=$request->all();
        DB::beginTransaction();
        try{
        foreach ($all['title'] as $k=>$v){
            $questionnaire_question=new QuestionnaireQuestion();
            $questionnaire_question->questionnaire_id=$questionnaire_id;
            $questionnaire_question->title=$v;
            $questionnaire_question->description=$all['description'][$k];
            $questionnaire_question->type=$all['type'];
            $questionnaire_question->lang=$k;
            $questionnaire_question->group_number=$group_number;
            $questionnaire_question->save();
            foreach ($all['item_title'][$k] as $m=>$n){
                $questionnaire_question_item=new QuestionnaireQuestionItem();
                $questionnaire_question_item->question_id=$questionnaire_question->id;
                $questionnaire_question_item->title=$n;
                $questionnaire_question_item->lang=$k;
                $questionnaire_question_item->mark=$all['item_code'][$k][$m];
                $questionnaire_question_item->group_number=$group_number;
                $questionnaire_question_item->save();
            }
        }
            DB::commit();
            return redirect("questionnaire/question/$questionnaire_id");
        }catch (Exception $e){
            DB::rollBack();
            dd($e);
        }
        return false;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $group_number
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($group_number)
    {
        $all=QuestionnaireQuestion::query()->where('group_number',$group_number)->with('questionnaire_question_item')->get();
        return view('admin.questionnaire.question.edit',compact('all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $group_number
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update($group_number,Request $request)
    {

        $all=$request->all();
        DB::beginTransaction();
        try{
        foreach ($all['title'] as $k=>$v){
            $questionnaire_question=QuestionnaireQuestion::query()->where('lang',$k)->where('group_number',$group_number)->first();
            $questionnaire_question->title=$v;
            $questionnaire_question->description=$all['description'][$k];
            $questionnaire_question->type=$all['type'];
            $questionnaire_question->save();
            QuestionnaireQuestionItem::query()->where('question_id',$questionnaire_question->id)->delete();
            foreach ($all['item_title'][$k] as $m=>$n){
                $questionnaire_question_item=new QuestionnaireQuestionItem();
                $questionnaire_question_item->question_id=$questionnaire_question->id;
                $questionnaire_question_item->title=$n;
                $questionnaire_question_item->lang=$k;
                $questionnaire_question_item->mark=$all['item_code'][$k][$m];
                $questionnaire_question_item->group_number=$group_number;
                $questionnaire_question_item->save();
            }
        }
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
        }
        return redirect("questionnaire/question/{$questionnaire_question->questionnaire_id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $questionnaire_id
     * @param $group_number
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function delete($questionnaire_id,$group_number)
    {
        QuestionnaireQuestion::query()->where('group_number',$group_number)->delete();
        return redirect("admin/questionnaire/question/$questionnaire_id");
    }
}
