<?php

namespace App\Http\Controllers\Module;

use App\Models\Questionnaire;
use App\Models\QuestionnaireQuestion;
use App\Services\Repositories\QuestionnaireRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class QuestionnaireController extends BaseController
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
    public function index()
    {
        //$all=$this->questionnaireRepository->getQuestionnaire($request);
        $all=Questionnaire::query()->paginate(15);
        return view('admin.questionnaire.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questionnaire.create',compact('all'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=auth()->user()->id;
        $request->author_id=$user_id;
        $result=$this->questionnaireRepository->createQuestionnaire($request);
        return redirect('questionnaire');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionnaire=Questionnaire::query()->where('id',$id)->first();
        return view('admin.questionnaire.preview.index',compact('questionnaire'));
    }

    /***
     * 预览试卷
     *
     * @param $questionnaire_id
     * @param $lang
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function preview($questionnaire_id,$lang)
    {
        $all=QuestionnaireQuestion::query()
            ->where('questionnaire_id',$questionnaire_id)
            ->where('lang',$lang)
            ->with('questionnaire_question_item')
            ->get()->toarray();
        return view('admin.questionnaire.preview.preview',compact('all'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $one=Questionnaire::query()->where('id',$id)->first(['id','title','description','lang']);
        return view('admin.questionnaire.edit',compact('one'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $one=Questionnaire::query()->where('id',$id)->first();
        $one->title=$request->title;
        $one->description=$request->description;
        $one->lang=$request->lang;
        $one->save();
        return redirect('questionnaire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Questionnaire::query()->where('id',$id)->delete();
        return redirect('questionnaire');
    }
}
