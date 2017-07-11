<?php
namespace Env\Controllers;
use App\Services\FileUtil;
use Illuminate\Foundation\Console\VendorPublishCommand;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class EnvController extends Controller
{
    public function index(){
        //$directories = Storage::allDirectories(plugin_address('edit-env/asset/'));
        //dd(plugin_address('edit-env/asset/'),$directories,public_path());
        //Storage::copyDirectory(plugin_address('edit-env').'/asset', '/public/vendor/plugins/edit-env');
        //$vendorPublishCommand->publishDirectory(plugin_address('edit-env').'/asset','/vendor/plugins/edit-env');
        $file_path=$this->getEnv();
        if(file_exists($file_path)){
            $str = file_get_contents($file_path);//将整个文件内容读入到一个字符串中
            $str = nl2br($str);
            return view('Env::index',compact('str'));
        }
        return view('Env::index');
    }

    public function updateEnv(Request $request){
        $all=$request->all();
        $file_path=$this->getEnv();
        if(file_exists($file_path)){
            $str = $this->br2nl($all['env']);
            $str=strip_tags($str);
            file_put_contents($file_path, $str);
            return redirect('system/env/index')->with('status', '修改成功!');
        }
        return redirect('system/env/index')->withErrors('修改失败！');
    }

    public function getEnv(){
        $base_path=base_path();
        $file_path = $base_path."/.env";
        return $file_path;
    }

    function br2nl($text){
        return preg_replace('/<br\\s*?\/??>/i','',$text);
    }
}
