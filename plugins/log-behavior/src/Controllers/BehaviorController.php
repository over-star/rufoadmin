<?php
namespace Behavior\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Rufo\Admin\Contracts\LogInterface;

class BehaviorController extends Controller
{
    public function logBehavior(Request $request,LogInterface $log){
        //$tes->put('das',2,"127.0.0.1");
        $all=$log->get($request->get('page',1));
//        $all=HandleLog::query()->paginate();
        return view('Behavior::index',compact('all'));
    }
}
