<?php

namespace Rufo\Admin\Http\Controllers;
use App\Events\PluginWasEnabled;
use App\Http\Controllers\Controller;
use App\Services\Plugin;
use App\Services\PluginManager;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Rufo\Admin\Models\Setting;

class SystemController extends Controller
{



    public function setting(Request $request)
    {
        $setting_type=config('admin.setting_type');
        if ($request->isMethod('post')) {
         $this->validate($request, [
            'key' => 'required|max:255|unique:setting',
            'display_name' => 'required|max:255|unique:setting',
            ]);
            $all=$request->all();
            $setting=new Setting();
            $setting->key=$all['key'];
            $setting->display_name=$all['display_name'];
            $setting->value=$all['value'];
            $setting->type=$all['type'];
            $setting->save();
        }
        //获取所有的设置
        $setting=Setting::get();
        return view('admin::system.setting',compact('setting_type','setting'));
    }
    public function updateSetting(Request $request)
    {
        $all=$request->all();
        Setting::truncate();
        foreach ($all['id'] as $k=>$v){
            $setting=new Setting();
            if($v['type']=="file"){
                //上传文件
                if(isset($v['value'])){
                    $file = $v['value'];
                    $date=Carbon::now()->toDateString();
                    $destinationPath= 'uploads/'.$date;
                    $file->move($destinationPath,$file->getClientOriginalName());
                    $setting->value='/'.$destinationPath.'/'.$file->getClientOriginalName();
                }
            }else{
                if(isset($v['value'])){
                    $setting->value=$v['value'];
                }
            }
            if(isset($v['key'])){
                $setting->key=$v['key'];
            }
            if(isset($v['display_name'])){
                $setting->display_name=$v['display_name'];
            }
            $setting->type=$v['type'];
            $setting->save();
        }
        return redirect('system/setting/index')->withErrors('修改成功！');
    }

    public function component(Request $request)
    {
        return view('admin::system.component');
    }

    public function plugins(){
        //获取插件
        $plugins = App::make('plugins');
        $plugin=$plugins->getPlugins()->all();
        $all=[];
        foreach ($plugin as $v){
            $temp=$v->toArray();
            //实现toarray方法
            $temp['isEnabled']=false;
            if($v->isEnabled()){
                $temp['isEnabled']=true;
            }
            $all[]=$temp;
        }
        //$plugins->enable('echo-hello');
        return view('admin::system.plugins',compact('all'));
    }
    public function pluginsEnable($name,PluginManager $plugins){
        //获取插件
        $plugins->enable($name);
        // 订单的发货逻辑...
        return redirect('system/plugins/index');
    }
    public function pluginsDisable($name,PluginManager $plugins){
        $plugins->disable($name);
        return redirect('system/plugins/index');
    }
    public function pluginsUninstall($name,PluginManager $plugins){
        $plugins->uninstall($name);
        return redirect('system/plugins/index');
    }

}
